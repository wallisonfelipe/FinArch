<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\Entity;

interface BaseRepository
{
    /**
     * @template T of Entity
    */
    public function insert(Entity $entity): Entity;
    public function getAll(): array;
}
