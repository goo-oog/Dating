<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\PhotoService;
use App\Services\ViewService;

class AppController
{
    private PhotoService $photo;
    private ViewService $view;

    public function __construct(PhotoService $photo,ViewService $view)
    {
        $this->photo=$photo;
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
//        $this->photo->getPhoto('8ef4028cce5cf108619cc251cc7ac64d.jpeg');
    }
}