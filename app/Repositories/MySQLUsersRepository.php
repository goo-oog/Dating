<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Services\MySQLService;
use PDO;

class MySQLUsersRepository implements UsersRepository
{
    private MySQLService $mySQL;

    public function __construct(MySQLService $mySQLService)
    {
        $this->mySQL = $mySQLService;
    }

    public function addUser(User $user, string $hash): void
    {
        $this->mySQL->pdo()->prepare('INSERT INTO users (name, gender) VALUES (?,?)')
            ->execute([$user->name(), $user->gender()]);
        $this->mySQL->pdo()->prepare('INSERT INTO hashes (userid, hash) VALUES ((SELECT id FROM users WHERE name LIKE :name),:hash)')
            ->execute(['name' => $user->name(), 'hash' => $hash]);
    }

    public function getHash($name): string
    {
        $stmt = $this->mySQL->pdo()->prepare('SELECT hash FROM hashes WHERE userid=(SELECT id FROM users WHERE name LIKE :name)');
        $stmt->execute(['name' => $name]);
        return $stmt->fetch()[0];
    }

    public function getUserById(int $id): User
    {
        $stmt = $this->mySQL->pdo()->prepare('SELECT id, name, gender FROM users WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return new User(...$stmt->fetch());
    }

    public function getUserByHash(string $hash): User
    {
        $stmt = $this->mySQL->pdo()->prepare('SELECT id, name, gender FROM users JOIN hashes ON id=userid WHERE hash=:hash');
        $stmt->execute(['hash' => $hash]);
        return new User(...$stmt->fetch());
    }

    public function checkUsername(string $name): bool
    {
        $stmt = $this->mySQL->pdo()->prepare('SELECT * FROM users WHERE name LIKE :name');
        $stmt->execute(['name' => $name]);
        return (bool)$stmt->fetch();
    }

    public function likeUser(int $fromId, int $toId): void
    {
        $this->mySQL->pdo()->prepare('INSERT INTO likes (userid, liked_by) VALUES (?,?)')
            ->execute([$toId, $fromId]);
    }

    public function dislikeUser(int $fromId, int $toId): void
    {
        $this->mySQL->pdo()->prepare('INSERT INTO likes (userid, disliked_by) VALUES (?,?)')
            ->execute([$toId, $fromId]);
    }

    /**
     * @inheritDoc
     */
    public function getUnratedUsersByCurrentUserId(int $id): array
    {
        $stmt = $this->mySQL->pdo()->prepare(
            'SELECT id, name, gender FROM users WHERE id NOT IN
                    (SELECT userid FROM likes WHERE liked_by = ? OR disliked_by = ?)
                      AND gender<>(SELECT gender from users WHERE id = ?) ORDER BY RAND() LIMIT 1');
        $stmt->execute([$id, $id, $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::class, [(int)'id', 'name', 'gender']);
    }

    public function getMatches(int $id): array
    {
        $stmt = $this->mySQL->pdo()->prepare(
            'SELECT id, name, gender FROM users WHERE id IN
                    (SELECT userid FROM (SELECT userid FROM likes WHERE liked_by = ?) x
                    JOIN (SELECT liked_by FROM likes WHERE userid = ?) y ON x.userid = y.liked_by) ORDER BY RAND()');
        $stmt->execute([$id, $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::class, [(int)'id', 'name', 'gender']);
    }
}