<?php

namespace App\Infrastructure\UserTaskCollections\Repositories\SingleActions;

use App\Domain\UserTaskCollections\Enums\UserAbilities;
use App\Domain\UserTaskCollections\UserTaskCollection as Entity;
use App\Infrastructure\UserTaskCollections\Models\UserTaskCollection as Model;
use Illuminate\Support\Collection;

class GetUserTaskCollectionRepository
{
    public function show(string $uuid): Model|null
    {
        /** @var Model|null $entity */
        $entity = Entity::whereId($uuid)
            ->firstOrFail()
            ->get();

        if (!$entity) {
            return null;
        }

        /** @var array{ participator_id: string, task_collection_id: string, ability: UserAbilities } $entityArray */
        $entityArray = $entity->toArray();

        return Model::fromArray($entityArray);
    }

    /**
     * @return Collection<int, Model>
     */
    public function all(): Collection
    {
        return Entity::all()
            ->map(function (Entity $entity) {
                /** @var array{ participator_id: string, task_collection_id: string, ability: UserAbilities } $entityArray */
                $entityArray = $entity->toArray();
                return Model::fromArray($entityArray);
            });
    }
}
