<?php

namespace App\Core\Domain\Repositories;

use App\Core\Application\Dtos\GetUserDTO;
use App\Core\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user): User;
    public function find(GetUserDTO $userDto): ?User;
    public function existsByEmail(string $email): bool;
    public function getAll(string $email): array;
}
