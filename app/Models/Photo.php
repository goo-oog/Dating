<?php
declare(strict_types=1);

namespace App\Models;

class Photo
{
    //do not rename these!
    private int $userid;
    private string $filename;
    private string $userfilename;

    public function __construct(int $userid, string $filename, string $userfilename)
    {
        $this->userid = $userid;
        $this->filename = $filename;
        $this->userfilename = $userfilename;
    }

    public function userid(): int
    {
        return $this->userid;
    }

    public function filename(): string
    {
        return $this->filename;
    }

    public function userFilename(): string
    {
        return $this->userfilename;
    }
}