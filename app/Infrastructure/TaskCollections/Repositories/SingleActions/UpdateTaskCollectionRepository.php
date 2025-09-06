<?php

namespace App\Infrastructure\TaskCollections\Repositories\SingleActions;

use App\Infrastructure\TaskCollections\Models\TaskCollection as Model;
use App\Domain\TaskCollections\TaskCollection as Entity;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateTaskCollectionRepository
{
    /**
     * @throws Throwable
     */
    public function update(string $uuid, Model $taskCollection): Model
    {
        /** @var Model */
        return DB::transaction(function () use ($uuid, $taskCollection) {
            $result = Entity::whereId($uuid)->update($taskCollection->toArray());
            if ($result) {
                return $taskCollection;
            }

            throw new Exception("Task Collection not updated");
        });
    }
}
