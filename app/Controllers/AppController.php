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

    public function __construct(PhotoService $photo,RatingService $rate,ViewService $view)
    {
        $this->photo=$photo;
        $this->rate=$rate;
        $this->view = $view;
    }

    public function showMainPage(): string
    {
        return $this->view->draw('_main-page.twig');
    }
    public function showAddPhotoForm():string{
        return $this->view->draw('_add-photo.twig');
    }
    public function addPhoto():void{
        $this->photo->addPhoto($_FILES['file']);
    }
    public function showMyPhotos():string{
        return $this->view->draw('_my-photos.twig');
    }
    public function photo(array $vars):string{
        return $this->photo->getPhoto($vars['photo']);
    }
    public function like():void{
        $this->rate->like((int)$_POST['id']);
    }
    public function dislike():void{
        $this->rate->dislike((int)$_POST['id']);
    }
}