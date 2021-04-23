<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AppController;
use App\Controllers\AuthController;
use App\Controllers\NotFoundController;
use App\Middlewares\AuthMiddleware;
use App\Repositories\MySQLPhotosRepository;
use App\Repositories\MySQLUsersRepository;
use App\Repositories\PhotosRepository;
use App\Repositories\UsersRepository;
use App\Services\AuthService;
use App\Services\MySQLService;
use App\Services\NewUserService;
use App\Services\PhotoService;
use App\Services\RatingService;
use App\Services\ViewService;
use League\Container\Container;


session_start();

$container = new Container();
$container->add(MySQLService::class, MySQLService::class);
$container->add(UsersRepository::class, MySQLUsersRepository::class)->addArgument(MySQLService::class);
$container->add(PhotosRepository::class, MySQLPhotosRepository::class)->addArgument(MySQLService::class);
$container->add(NewUserService::class)->addArgument(UsersRepository::class);
$container->add(AuthService::class)->addArgument(UsersRepository::class);
$container->add(PhotoService::class)->addArguments([UsersRepository::class, PhotosRepository::class]);
$container->add(RatingService::class)->addArgument(UsersRepository::class);
$container->add(ViewService::class)->addArguments([UsersRepository::class, PhotosRepository::class, PhotoService::class]);
$container->add(AppController::class)->addArguments([PhotoService::class, RatingService::class, ViewService::class]);
$container->add(AuthController::class)->addArguments([AuthService::class, NewUserService::class, ViewService::class]);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->get('/', [AppController::class, 'showMainPage']);
    $r->get('/login', [AuthController::class, 'showLoginForm']);
    $r->get('/logout', [AuthController::class, 'logout']);
    $r->post('/authentication', [AuthController::class, 'authentication']);
    $r->get('/create-account', [AuthController::class, 'showCreateAccountForm']);
    $r->post('/new-user', [AuthController::class, 'createNewUser']);
    $r->get('/add-photo', [AppController::class, 'showAddPhotoForm']);
    $r->post('/add-photo', [AppController::class, 'addPhoto']);
    $r->post('/delete-photo', [AppController::class, 'deletePhoto']);
    $r->get('/my-profile', [AppController::class, 'showMyProfile']);
    $r->get('/photo/{photo}', [AppController::class, 'photo']);
    $r->post('/like', [AppController::class, 'like']);
    $r->post('/dislike', [AppController::class, 'dislike']);
    $r->get('/matches', [AppController::class, 'showMatches']);
    $r->get('/user-profile/{id}', [AppController::class, 'userProfile']);
    $r->get('/user-profile', [AppController::class, 'showUserProfile']);
});

$allowedWithoutAuthorization = [
    AuthController::class . '@showLoginForm',
    AuthController::class . '@showCreateAccountForm'
];

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo (new NotFoundController())->index();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo (new NotFoundController())->index();
        break;
    case FastRoute\Dispatcher::FOUND:
        [$controller, $method] = $routeInfo[1];
        $vars = $routeInfo[2];
        if (!in_array($controller . '@' . $method, $allowedWithoutAuthorization)) {
            (new AuthMiddleware())->execute();
        }
        echo $container->get($controller)->$method($vars);
}