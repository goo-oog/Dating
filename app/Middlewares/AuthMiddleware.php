<?php
declare(strict_types=1);

namespace App\Middlewares;

class AuthMiddleware
{
    public function execute(): void
    {
        if (!isset($_SESSION['authId'])) {
            header('Location:/login');
        }
    }
}