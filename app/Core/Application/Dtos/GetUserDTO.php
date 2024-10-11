<?php

namespace App\Core\Application\Dtos;

class GetUserDTO
{
    public function __construct(
        public ?string $name = "",
        public ?string $email = "",
        public ?string $password = ""
    )
    {}
}
