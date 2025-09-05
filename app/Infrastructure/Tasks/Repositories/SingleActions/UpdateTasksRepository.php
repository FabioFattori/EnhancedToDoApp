<?php

namespace App\Infrastructure\Tasks\Repositories\SingleActions;

use App\Infrastructure\Tasks\Models\Task;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Domain\Tasks\Task as Entity;
use Throwable;

class UpdateTasksRepository
{
    /**
     * @throws Throwable
     */
    public function update(string $uuid, Task $model): Task
    {
        return DB::transaction(function () use ($uuid, $model) {
            if (
                Entity::whereId($uuid)->update(
                    $model->toArray()
                )
            ) {
                return $model;
            }

            throw new Exception("Task not updated");
        });
    }
}
