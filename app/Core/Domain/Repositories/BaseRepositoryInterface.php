<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\Entity;

interface BaseRepository
{
    public function insert(Entity $entity): Entity;
}
