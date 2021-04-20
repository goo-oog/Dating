<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\UsersRepository;

class NewUserService
{
    private UsersRepository $users;

    public function __construct(UsersRepository $users)
    {
        $this->users = $users;
    }

    public function createNewUser(string $username, string $password, string $gender): void
    {
        if (!$this->users->checkUsername($username)) {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $this->users->addUser(new User(0, $username, $gender), $hash);
            $_SESSION['authId'] = $hash;
            header('Location:/');
        }else{
            header('Location:/create-account');
        }
    }
}