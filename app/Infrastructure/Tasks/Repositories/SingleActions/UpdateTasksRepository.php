<?php

namespace App\Infrastructure\Tasks\Repositories\SingleActions;

use App\Infrastructure\Tasks\Models\Task;
use Illuminate\Support\Facades\DB;
use App\Domain\Tasks\Task as Entity;
use Throwable;

class UpdateTasksRepository
{
    /**
     * @throws Throwable
     */
    public function update(string $uuid, Task $model): void
    {
        DB::beginTransaction();
        try {
            Entity::query()->whereId($uuid)->update(
                $model->toArray()
            );
            DB::commit();
        }catch (Throwable $e){
            DB::rollBack();
        }
    }
}
