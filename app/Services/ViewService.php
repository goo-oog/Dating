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
    private array $twigVariables;

    public function __construct(UsersRepository $users, PhotosRepository $photos)
    {
        $this->users = $users;
        $this->photos = $photos;
        $this->twig = new TwigService();
        $this->twigVariables = [
            'users' => $this->users,
            'photos' => $this->photos,
        ];
    }

    public function draw(string $filename): string
    {
        return $this->twig->environment()->render($filename, $this->twigVariables);
    }
}