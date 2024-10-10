<?php

namespace App\Core\Application\Services\User;

use App\Core\Application\Dtos\CreateUserDTO;
use App\Core\Domain\Entities\User;
use App\Core\Domain\Repositories\UserRepositoryInterface;

class CreateUserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {}

    public function execute(CreateUserDTO $createUserDTO): User
    {
        $user = new User("John Doe", "", "");

        return $user;
    }
}
