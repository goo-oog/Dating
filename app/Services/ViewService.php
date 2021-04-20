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
        ];
    }

    public function draw(string $filename): string
    {
        if(isset($_SESSION['authId'])){
            try {
                $this->twigVariables['currentUser']=$this->users->getUserByHash($_SESSION['authId']);
            }catch (ArgumentCountError $e){
                unset($_SESSION['authId']);
                header('Location: /login');
            }
        }
        return $this->twig->environment()->render($filename, $this->twigVariables);
    }
}