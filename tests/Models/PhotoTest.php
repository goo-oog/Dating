<?php
declare(strict_types=1);

namespace Tests\Models;

use App\Models\Photo;
use PHPUnit\Framework\TestCase;

class PhotoTest extends TestCase
{

    public function testUserFilename()
    {
        $photo = new Photo(1, md5('abc.jpg' . microtime()), 'abc.jpg');
        self::assertEquals('abc.jpg', $photo->userFilename());
    }

    public function testUserid()
    {
        $photo = new Photo(1, md5('abc.jpg' . microtime()), 'abc.jpg');
        self::assertEquals(1, $photo->userid());
    }

    public function testFilename()
    {
        $filename = md5('abc.jpg' . microtime());
        $photo = new Photo(1, $filename, 'abc.jpg');
        self::assertEquals($filename, $photo->filename());
    }
}
