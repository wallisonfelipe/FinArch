<?php

namespace App\Core\Infra\Repositories\User;

use App\Core\Domain\Entities\User;
use App\Core\Domain\Repositories\BaseRepository;
use App\Core\Domain\Repositories\UserRepositoryInterface;
use App\Core\Infra\Repositories\Base\MemoryRepository;

class UserRepository implements UserRepositoryInterface
{
    private BaseRepository $repository;

    public function __construct()
    {
        $this->repository = new MemoryRepository();
    }

    public function create(User $user): User
    {
        $this->repository->insert($user);
        return $user;
    }
}