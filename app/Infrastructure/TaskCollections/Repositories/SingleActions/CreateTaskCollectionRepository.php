<?php

namespace App\Infrastructure\TaskCollections\Repositories\SingleActions;

use App\Infrastructure\TaskCollections\Models\TaskCollection as Model;
use App\Domain\TaskCollections\TaskCollection as Entity;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateTaskCollectionRepository
{
    /**
     * @throws Throwable
     */
    public function create(Model $taskCollection): Model
    {
        return DB::transaction(function () use ($taskCollection) {
            /** @var array{ uuid: string,title: string, description: string, creator_id: string} $entityArray */
            $entityArray = Entity::create(
                $taskCollection->toArray()
            )->toArray();

            return Model::fromArray(
                $entityArray
            );
        });
    }
}
