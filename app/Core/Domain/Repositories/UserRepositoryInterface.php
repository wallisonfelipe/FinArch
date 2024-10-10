<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user): User;
}
