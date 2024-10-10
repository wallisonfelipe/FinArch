<?php

namespace App\Core\Domain\Entities;

class User extends Entity
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}

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

}
