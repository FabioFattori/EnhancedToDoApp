<?php

namespace App\Infrastructure\UserTaskCollections\Repositories\SingleActions;

use App\Domain\UserTaskCollections\UserTaskCollection as Entity;
use App\Infrastructure\UserTaskCollections\Models\UserTaskCollection as Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateUserTaskCollectionRepository
{
    /**
     * @throws Throwable
     */
    public function update(string $uuid, Model $userTaskCollection): void
    {
        DB::beginTransaction();
        try {
            Entity::whereId($uuid)->update($userTaskCollection->toArray());
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
        }
    }
}
