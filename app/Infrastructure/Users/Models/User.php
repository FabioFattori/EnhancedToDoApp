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

    /**
     * @return array{ name: string, email: string, password: string }
     */
    public function toArray() : array
    {
        return [
          'name' => $this->name,
          'email' => $this->email,
          'password' => $this->password
        ];
    }

    /**
     * @param array{ name: string, email: string, password: string } $data
     * @return User
     */
    public static function fromArray(array $data): User
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password']
        );
    }
}
