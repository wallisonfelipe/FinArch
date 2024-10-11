<?php

namespace App\Core\Infra\Repositories\Base;

use App\Core\Domain\Entities\Entity;
use App\Core\Domain\Repositories\BaseRepository;

class MemoryRepository implements BaseRepository
{
    private array $items = [];

    public function insert(Entity $entity): Entity
    {
        $this->items[] = $entity;

        return $entity;
    }

    public function getAll(): array
    {
        return $this->items;
    }

    public function find(string $id): ?Entity
    {
        foreach ($this->items as $item) {
            if ($item->id === $id) {
                return $item;
            }
        }

        return null;
    }

}