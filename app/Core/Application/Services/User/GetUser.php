<?php

namespace App\Core\Application\Services\User;

use App\Core\Application\Dtos\GetUserDTO;
use App\Core\Domain\Entities\User;
use App\Core\Domain\Repositories\UserRepositoryInterface;

class GetUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {}

    public function execute(GetUserDTO $createUserDTO): User
    {
        return $this->userRepository->find($createUserDTO);
    }
}
