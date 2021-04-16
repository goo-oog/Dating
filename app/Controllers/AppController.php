<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\ViewService;

class AppController
{
    private ViewService $view;

    public function __construct(ViewService $view)
    {
        $this->view = $view;
    }

    public function showMainPage(): string
    {
        return $this->view->draw('_main-page.twig');
    }
}