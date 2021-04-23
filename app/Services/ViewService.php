<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\PhotosRepository;
use App\Repositories\UsersRepository;
use ArgumentCountError;

class ViewService
{
    private UsersRepository $users;
    private PhotosRepository $photos;
    private TwigService $twig;
    private PhotoService $photoService;

    public function __construct(UsersRepository $users, PhotosRepository $photos, PhotoService $photoService)
    {
        $this->users = $users;
        $this->photos = $photos;
        $this->twig = new TwigService();
        $this->photoService = $photoService;
    }

    public function draw(string $filename): string
    {
        $twigVariables = [
            'users' => $this->users,
            'photos' => $this->photos,
            'photoService' => $this->photoService,
            'SESSION' => $_SESSION,
        ];
        if (isset($_SESSION['authId'])) {
            try {
                $twigVariables['currentUser'] = $this->users->getUserByHash($_SESSION['authId']);
            } catch (ArgumentCountError $e) {
                unset($_SESSION['authId']);
                header('Location: /login');
            }
        }
        unset($_SESSION['uploadError']);
        return $this->twig->environment()->render($filename, $twigVariables);
    }
}