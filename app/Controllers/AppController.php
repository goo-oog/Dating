<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\RatingService;
use App\Services\PhotoService;
use App\Services\ViewService;

class AppController
{
    private PhotoService $photo;
    private RatingService $rate;
    private ViewService $view;

    public function __construct(PhotoService $photo, RatingService $rate, ViewService $view)
    {
        $this->photo = $photo;
        $this->rate = $rate;
        $this->view = $view;
    }

    public function showMainPage(): string
    {
        return $this->view->draw('_main-page.twig');
    }

    public function showAddPhotoForm(): string
    {
        return $this->view->draw('_add-photo.twig');
    }

    public function addPhoto(): void
    {
        $this->photo->addPhoto($_FILES['file']);
    }

    public function deletePhoto(): void
    {
        $this->photo->deletePhoto($_POST['filename']);
    }

    public function showMyProfile(): string
    {
        return $this->view->draw('_my-profile.twig');
    }

    public function photo(array $vars): string
    {
        return $this->photo->getPhoto($vars['photo']);
    }

    public function like(): void
    {
        $this->rate->like((int)$_POST['id']);
    }

    public function dislike(): void
    {
        $this->rate->dislike((int)$_POST['id']);
    }

    public function showMatches(): string
    {
        return $this->view->draw('_matches.twig');
    }

    public function userProfile(array $vars): void
    {
        $_SESSION['userId'] = $vars['id'];
        header('Location:/user-profile');
    }

    public function showUserProfile(): string
    {
        if (isset($_SESSION['userId'])) {
            return $this->view->draw('_user-profile.twig');
        }
        return $this->view->draw('_main-page.twig');
    }
}