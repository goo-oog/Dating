<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\UsersRepository;

class AuthService
{
    private UsersRepository $users;

    public function __construct(UsersRepository $users)
    {
        $this->users=$users;
    }
    public function verify():void{
        $hash=$this->users->getHash($_POST['username']);
        if(password_verify($_POST['password'],$hash)){
            header('Location:/');
        }else{
            header('Location:/login');
        }
    }
}