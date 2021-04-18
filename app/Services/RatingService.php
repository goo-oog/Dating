<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\UsersRepository;

class RatingService
{
    private UsersRepository $users;
    public function __construct(UsersRepository $users)
    {
        $this->users=$users;
    }
    public function like(int $toId):void{
        $this->users->likeUser($this->users->getUserByHash($_SESSION['authId'])->id(),$toId);
        header('Location: /');
    }
    public function dislike(int $toId):void{
        $this->users->dislikeUser($this->users->getUserByHash($_SESSION['authId'])->id(),$toId);
        header('Location: /');
    }
}