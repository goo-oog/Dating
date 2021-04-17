<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\UsersRepository;

class AuthService
{
    private UsersRepository $users;

    public function __construct(UsersRepository $users)
    {
        $this->users = $users;
    }

    public function verify(string $username, string $password): void
    {
        $hash = $this->users->getHash($username);
        if (password_verify($password, $hash)) {
            $_SESSION['authId']=$hash;
            header('Location:/');
        } else {
            header('Location:/login');
        }
    }
    public function logout():void{
        unset($_SESSION['authId']);
        header('Location:/');
    }
}