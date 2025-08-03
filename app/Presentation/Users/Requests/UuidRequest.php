<?php

namespace App\Presentation\Users\Requests;

class UuidRequest
{
    public function __construct(
        private readonly string $uuid
    )
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

}
