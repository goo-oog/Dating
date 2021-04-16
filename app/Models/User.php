<?php
declare(strict_types=1);

namespace App\Models;

class User
{
    private int $id;
    private string $name;
    private string $gender;

    public function __construct(int $id, string $name, string $gender)
    {
        $this->id = $id;
        $this->name = $name;
        $this->gender = $gender;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function gender(): string
    {
        return $this->gender;
    }
}