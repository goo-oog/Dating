<?php
declare(strict_types=1);

namespace App\Models;

class Photo
{
    private int $userid;
    private string $filename;

    public function __construct(int $userid, string $filename)
    {
        $this->userid = $userid;
        $this->filename = $filename;
    }

    public function userid(): int
    {
        return $this->userid;
    }

    public function filename(): string
    {
        return $this->filename;
    }
}