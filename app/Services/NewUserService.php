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
        $this->users=$users;
    }
    public function createNewUser():void{
        if($this->users->checkUsername($_POST['username'])){
            header('Location:/create-account');
        }else{
            $hash=password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->users->addUser(new User(0,$_POST['username'],$_POST['gender']),$hash);
            $_SESSION['authId']=$hash;
            header('Location:/');
        }
    }
}