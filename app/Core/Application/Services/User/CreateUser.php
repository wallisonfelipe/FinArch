<?php

namespace App\Core\Application\Services\User;

use App\Core\Application\Dtos\CreateUserDTO;
use App\Core\Domain\Entities\User;
use App\Core\Domain\Repositories\UserRepositoryInterface;

class CreateUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {}

    public function execute(CreateUserDTO $createUserDTO): User
    {
        $user = new User(
            name:$createUserDTO->name,
            email: $createUserDTO->email,
            password: $createUserDTO->password);

        if ($this->userRepository->existsByEmail($user->email)) {
            throw new \Exception("E-mail already exists");
        }

        $this->userRepository->create($user);

        return $user;
    }
}
