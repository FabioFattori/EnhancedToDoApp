<?php

namespace App\Infrastructure\UserTaskCollections\Repositories\SingleActions;

use App\Domain\UserTaskCollections\Enums\UserAbilities;
use App\Domain\UserTaskCollections\UserTaskCollection as Entity;
use App\Infrastructure\UserTaskCollections\Models\UserTaskCollection as Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateUserTaskCollectionRepository
{
    /**
     * @throws Throwable
     */
    public function create(Model $model): Model
    {
        /** @var Model */
        return DB::transaction(function () use ($model) {
            /** @var array{
             *     uuid: string,
             *     participator_id: string,
             *     task_collection_id: string,
             *      ability: UserAbilities
             * } $entityArray
             */
            $entityArray = Entity::create(
                $model->toArray()
            )->toArray();

            return Model::fromArray($entityArray);
        });
    }
}
