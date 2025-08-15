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
    public function create(Model $taskCollection): void
    {
        DB::beginTransaction();
        try {
            new Entity($taskCollection->toArray());
            DB::commit();
        }catch (Throwable $exception){
            DB::rollBack();
        }
    }
}
