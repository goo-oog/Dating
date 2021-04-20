<?php
declare(strict_types=1);

namespace App\Middlewares;

class AuthMiddleware
{
    public function handle(): void
    {
        if (!isset($_SESSION['authId'])) {
            header('Location:/login');
        }
    }
}