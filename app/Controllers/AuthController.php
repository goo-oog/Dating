<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\AuthService;
use App\Services\NewUserService;
use App\Services\ViewService;

class AuthController
{
    private AuthService $authorization;
    private NewUserService $newUser;
    private ViewService $view;

    public function __construct(AuthService $authorization, NewUserService $newUser, ViewService $view)
    {
        $this->authorization = $authorization;
        $this->newUser = $newUser;
        $this->view = $view;
    }

    public function showLoginForm(): string
    {
        return $this->view->draw('_login.twig');
    }

    public function showCreateAccountForm(): string
    {
        return $this->view->draw('_create-account.twig');
    }

    public function authentication(): void
    {
        $this->authorization->verify($_POST['username'], $_POST['password']);
    }

    public function createNewUser(): void
    {
        if ($_POST['username'] && $_POST['password'] && $_POST['gender']) {
            $this->newUser->createNewUser($_POST['username'], $_POST['password'], $_POST['gender']);
        } else {
            header('Location:/create-account');
        }
    }

    public function logout(): void
    {
        $this->authorization->logout();
    }
}