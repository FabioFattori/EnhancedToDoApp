<?php

namespace App\Infrastructure\Tasks\Repositories\SingleActions;

use App\Infrastructure\Tasks\Models\Task;
use Illuminate\Support\Facades\DB;
use App\Domain\Tasks\Task as Entity;
use Throwable;

class CreateTasksRepository
{
    /**
     * @throws Throwable
     */
    public function create(Task $model): void
    {
        DB::beginTransaction();
        try {
            new Entity(
                $model->toArray()
            );
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
        }
    }
}
