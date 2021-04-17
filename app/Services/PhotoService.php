<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\PhotosRepository;
use App\Repositories\UsersRepository;

class PhotoService
{
    private UsersRepository $users;
    private PhotosRepository $photos;
    public const PHOTOS_PATH = '../storage/photos/';

    public function __construct(UsersRepository $users, PhotosRepository $photos)
    {
        $this->users = $users;
        $this->photos = $photos;
    }

    public function addPhoto($file): void
    {
        if ($file["error"] === 0) {
            if ($file["size"] > 0 && $file["size"] < 8 * 1024 * 1024) {
                if (in_array($file["type"], ['image/gif', 'image/jpeg', 'image/png'])) {
                    $filename = md5($file['name'] . microtime()) . '.' . substr($file['type'], strpos($file['type'], '/') + 1);
                    $directory1 = self::PHOTOS_PATH . substr($filename, 0, 2) . '/';
                    $directory2 = $directory1 . substr($filename, 2, 2) . '/';
                    if (!is_dir(self::PHOTOS_PATH)) {
                        mkdir(self::PHOTOS_PATH);
                    }
                    if (!is_dir($directory1)) {
                        mkdir($directory1);
                    }
                    if (!is_dir($directory2)) {
                        mkdir($directory2);
                    }
                    move_uploaded_file($file["tmp_name"], $directory2 . $filename);
                    $this->photos->addPhoto($this->users->getUserByHash($_SESSION['authId'])->id(), $filename, $file['name']);
                    header('Location:/my-photos');
                }
            }
        }
    }

    public function getPhoto(string $filename)
    {
        $realFilename = self::PHOTOS_PATH . substr($filename, 0, 2) . '/' . substr($filename, 2, 2) . '/' . $filename;
//        var_dump($realFilename);die();
//        var_dump(file_get_contents($realFilename));die();
//        $imginfo = getimagesize($realFilename);
//        header("Content-type: 'image/jpeg'");
//        header("content-type: image/jpeg");
//        return readfile($realFilename);
        $file= file_get_contents($realFilename);
//        header('Content-Type: application/octet-stream');
//        return $realFilename;
        return base64_encode($file);
    }
}