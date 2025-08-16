<?php

namespace App\Infrastructure\UserTaskCollections\Repositories\SingleActions;

use App\Domain\UserTaskCollections\UserTaskCollection as Entity;
use App\Infrastructure\UserTaskCollections\Models\UserTaskCollection as Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateUserTaskCollectionRepository
{
    /**
     * @throws Throwable
     */
    public function create(Model $model): void
    {
        DB::beginTransaction();
        try {
            new Entity(
                $model->toArray()
            );
            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
        }
    }
}
