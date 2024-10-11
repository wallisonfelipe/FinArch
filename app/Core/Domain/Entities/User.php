<?php

namespace App\Core\Domain\Entities;

class User extends Entity
{
    public string $id = '';

    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
        if (!$this->id) {
            $this->id = uniqid();
        }
        if (empty($name)) {
            throw new \Exception("Name is required");
        }
        if (empty($email)) {
            throw new \Exception("E-mail is required");
        }
        if (empty($password)) {
            throw new \Exception("Password is required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Invalid e-mail");
        }

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

}
