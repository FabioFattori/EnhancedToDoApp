<?php

namespace App\Presentation\Users\Requests;

readonly class FillableDataRequest
{
    public function __construct(
        private string $email,
        private string $name,
        private string $password,
    )
    {
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

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
            'password' => $this->password,
        ];
    }
}
