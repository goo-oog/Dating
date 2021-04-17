<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\PhotosRepository;
use App\Repositories\UsersRepository;

class ViewService
{
    private UsersRepository $users;
    private PhotosRepository $photos;
    private TwigService $twig;
    private PhotoService $photoService;
    private array $twigVariables;

    public function __construct(UsersRepository $users, PhotosRepository $photos, PhotoService $photoService)
    {
        $this->users = $users;
        $this->photos = $photos;
        $this->twig = new TwigService();
        $this->photoService= $photoService;
        $this->twigVariables = [
            'users' => $this->users,
            'photos' => $this->photos,
            'photoService'=>$this->photoService,
            'SESSION'=>$_SESSION,
            'currentUser'=>$this->users->getUserByHash($_SESSION['authId'])
        ];
    }

    public function draw(string $filename): string
    {
//echo '<pre>';
//      users.getUnratedUsersByCurrentUserId(users.getUserByHash(SESSION.authId).id)
//        var_dump($this->users->getUnratedUsersByCurrentUserId(113));die();
//        var_dump($this->photos->getUserPhotos($this->users->getUserByHash($_SESSION['authId'])->id()));die();
//        header("Content-type: 'image/jpeg'");
        return $this->twig->environment()->render($filename, $this->twigVariables);
    }
}