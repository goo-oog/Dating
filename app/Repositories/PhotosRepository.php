<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Photo;

interface PhotosRepository
{
    public function addPhoto(string $userid, string $filename): void;

    /**
     * @param int $id
     * @return Photo[]
     */
    public function getUserPhotos(int $id): array;
}