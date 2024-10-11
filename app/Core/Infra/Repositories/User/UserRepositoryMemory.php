<?php

namespace App\Core\Infra\Repositories\User;

use App\Core\Application\Dtos\GetUserDTO;
use App\Core\Domain\Entities\User;
use App\Core\Domain\Repositories\UserRepositoryInterface;
use App\Core\Infra\Repositories\Base\MemoryRepository;

class UserRepositoryMemory implements UserRepositoryInterface
{
    private MemoryRepository $repository;

    public function __construct()
    {
        $this->repository = new MemoryRepository();
    }

    public function create(User $user): User
    {
        $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        
        $this->repository->insert($user);
        return $user;
    }

    public function existsByEmail(string $email): bool
    {
        $user = $this->repository->find($email);

        return $user !== null;
    }

    public function find(GetUserDTO $userDto): ?User
    {
        return $this->repository->find($userDto->email);
    }

    public function getAll(string $email): array
    {
        return $this->repository->getAll($email);
    }


}