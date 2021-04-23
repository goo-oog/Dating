<?php
declare(strict_types=1);

namespace Tests\Models;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testName()
    {
        $user = new User(1, 'Test', 'F');
        self::assertEquals('Test', $user->name());
    }

    public function testId()
    {
        $user = new User(1, 'Test', 'F');
        self::assertEquals(1, $user->id());
    }

    public function testGender()
    {
        $user = new User(1, 'Test', 'F');
        self::assertEquals('F', $user->gender());
    }
}
