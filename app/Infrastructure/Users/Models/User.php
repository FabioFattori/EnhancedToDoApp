<?php

namespace App\Infrastructure\Users\Models;

class User
{
    public function __construct(
        protected string $name,
        protected string $email,
        protected string $password
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public static function fromArray(array $data): User
    {
        return new static(
            $data['name'],
            $data['email'],
            $data['password']
        );
    }
}
