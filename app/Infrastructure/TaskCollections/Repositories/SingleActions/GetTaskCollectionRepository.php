<?php

namespace App\Infrastructure\TaskCollections\Repositories\SingleActions;

use App\Infrastructure\TaskCollections\Models\TaskCollection as Model;
use App\Domain\TaskCollections\TaskCollection as Entity;
use Illuminate\Support\Collection;

class GetTaskCollectionRepository
{
    public function show(string $uuid): Model|null
    {
        /** @var Entity|null $response */
        $response = Entity::whereId($uuid)
            ->firstOrFail();

        if (!$response) {
            return null;
        }

        /** @var array{ uuid: string, title: string, description: string, creator_id: string } $entityArray */
        $entityArray = $response->toArray();

        return Model::fromArray(
            $entityArray
        );
    }

    /**
     * @return Collection<int, Model>
     */
    public function all(): Collection
    {
        return Entity::all()
            ->map(
                function ($entity) {
                    /** @var array{ uuid: string,title: string, description: string, creator_id: string } $entityArray */
                    $entityArray = $entity->toArray();
                    return Model::fromArray($entityArray);
                }
            );
    }
}
