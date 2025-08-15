<?php

namespace App\Infrastructure\TaskCollections\Repositories\SingleActions;

use App\Infrastructure\TaskCollections\Models\TaskCollection as Model;
use App\Domain\TaskCollections\TaskCollection as Entity;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateTaskCollectionRepository
{
    /**
     * @throws Throwable
     */
    public function update(string $uuid, Model $taskCollection) : void
    {
        DB::beginTransaction();
        try {
            Entity::whereId($uuid)->update($taskCollection->toArray());
            DB::commit();
        }catch (Throwable $e) {
            DB::rollBack();
        }
    }
}
