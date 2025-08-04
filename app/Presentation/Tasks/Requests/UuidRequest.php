<?php

namespace App\Presentation\Tasks\Requests;

readonly class UuidRequest
{
    public function __construct(
        private string $uuid
    )
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
