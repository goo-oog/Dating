<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

interface UsersRepository
{
    public function addUser(User $user, string $hash): void;

    public function getHash($name): string;

    public function getUserById(int $id): User;

    public function getUserByHash(string $hash):User;

    public function checkUsername(string $name): bool;

    public function likeUser(int $fromId, int $toId): void;

    public function dislikeUser(int $fromId, int $toId): void;

    /**
     * @param int $id
     * @return User[]
     */
    public function getUnratedUsersByCurrentUserId(int $id): array;
}