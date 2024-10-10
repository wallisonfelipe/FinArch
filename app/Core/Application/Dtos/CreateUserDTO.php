<?php

namespace App\Core\Application\Dtos;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    )
    {
        
    }
}
