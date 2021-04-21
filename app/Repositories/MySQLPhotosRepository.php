<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Photo;
use App\Services\MySQLService;
use PDO;

class MySQLPhotosRepository implements PhotosRepository
{
    private MySQLService $mySQL;

    public function __construct(MySQLService $mySQLService)
    {
        $this->mySQL = $mySQLService;
    }

    public function addPhoto(int $userid, string $filename, string $userFilename): void
    {
        $this->mySQL->pdo()->prepare('INSERT INTO photos (userid, filename, userfilename) VALUES (?,?,?)')
            ->execute([$userid, $filename, $userFilename]);
    }

    /**
     * @inheritDoc
     */
    public function getUserPhotos(int $id): array
    {
        $stmt = $this->mySQL->pdo()->prepare('SELECT * FROM photos WHERE userid=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Photo::class, [(int)'userid', 'filename', 'userfilename']); //do not rename these!
    }
}