<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

interface DatingRepository
{
    public function addUser(User $user):void;
    public function getUser(int $id):User;
    public function likeUser(int $fromId,int $toId):void;
    public function dislikeUser(int $fromId,int $toId):void;

    /**
     * @param int $id
     * @return User[]
     */
    public function getUnratedUsersByCurrentUserId(int $id):array;
}