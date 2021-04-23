<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\PhotosRepository;
use App\Repositories\UsersRepository;
use FilesystemIterator;

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
        if ($file['error'] === 0) {
            if ($file['size'] > 0 && $file['size'] < 8 * 1024 * 1024) {
                if (in_array($file['type'], ['image/gif', 'image/jpeg', 'image/png'])) {
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
                    move_uploaded_file($file['tmp_name'], $directory2 . $filename);
                    $this->photos->addPhoto($this->users->getUserByHash($_SESSION['authId'])->id(), $filename, $file['name']);
                    header('Location:/my-profile');
                } else {
                    $_SESSION['uploadError'] = 'Only JPG, PNG ang GIF files allowed';
                }
            } else {
                $_SESSION['uploadError'] = 'File size must not exceed 8 MB';
            }
        } else {
            $_SESSION['uploadError'] = 'Select file';
        }
        header('Location:/add-photo');
    }

    public function deletePhoto(string $filename): void
    {
        $directory1 = self::PHOTOS_PATH . substr($filename, 0, 2) . '/';
        $directory2 = $directory1 . substr($filename, 2, 2) . '/';
        unlink($directory2 . $filename);
        if (is_dir($directory2) && !(new FilesystemIterator($directory2))->valid()) {
            rmdir($directory2);
        }
        if (is_dir($directory1) && !(new FilesystemIterator($directory1))->valid()) {
            rmdir($directory1);
        }
        $this->photos->deletePhoto($filename);
        header('Location:/my-profile');
    }

    public function getPhoto(string $filename): string
    {
        $realFilename =
            self::PHOTOS_PATH
            . substr($filename, 0, 2)
            . '/' . substr($filename, 2, 2)
            . '/' . substr($filename, 0, 32)
            . '.' . substr($filename, 32);
        switch (substr($filename, 32)) {
            case 'jpg':
            case 'jpeg':
                $contentType = 'image/jpeg';
                break;
            case 'png':
                $contentType = 'image/png';
                break;
            case 'gif':
                $contentType = 'image/gif';
        }
        header('content-type: ' . $contentType);
        return file_get_contents($realFilename);
    }
}