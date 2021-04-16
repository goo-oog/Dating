<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Photo;
use App\Services\MySQLService;
use PDO;

class MySQLPhotoRepository implements PhotoRepository
{
    private MySQLService $mySQL;
    public function __construct(MySQLService $mySQLService)
    {
        $this->mySQL = $mySQLService;
    }
    public function addPhoto(string $userid, string $filename): void
    {
        $this->mySQL->pdo()->prepare('INSERT INTO photos (userid, filename) VALUES (?,?)')
            ->execute([$userid,$filename]);
    }

    /**
     * @inheritDoc
     */
    public function getUserPhotos(int $id): array
    {
        $stmt=$this->mySQL->pdo()->prepare('SELECT * FROM photos WHERE userid=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Photo::class, ['userid', 'filename']);
    }
}