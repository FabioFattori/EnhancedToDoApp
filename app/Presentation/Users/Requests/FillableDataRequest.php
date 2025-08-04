<?php

namespace App\Presentation\Users\Requests;

readonly class FillableDataRequest
{
    public function __construct(
        private string|null $uuid,
        private string $email,
        private string $name,
        private string $password,
    )
    {
    }

    public function getUuid(): string|null
    {
        return $this->uuid;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function toArrayModel(): array
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
            'password' => $this->password,
        ];
    }
}
