<?php
declare(strict_types=1);

namespace App\Middlewares;

class AuthMiddleware
{
    public function handle(): void
    {
        //unset($_SESSION['authId']);
        if (!isset($_SESSION['authId'])) {
            header('Location:/login');
        }
    }
}