<?php

namespace App\Infrastructure\Tasks\Repositories\SingleActions;

use App\Domain\Tasks\Enums\TaskSeverities;
use App\Domain\Tasks\Enums\TaskStatus;
use App\Infrastructure\Tasks\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Domain\Tasks\Task as Entity;
use Throwable;

class CreateTasksRepository
{
    /**
     * @throws Throwable
     */
    public function create(Task $model): Task
    {
        /** @var Task */
        return DB::transaction(function () use ($model) {
            /** @var array{
             * uuid: string,
             * title: string,
             * description: string,
             * due_date: Carbon,
             * severity: TaskSeverities,
             * status: TaskStatus,
             * owner_id: string,
             * worker_id: string,
             * task_collection_id: string
             * } $entityArray */
            $entityArray = Entity::create(
                $model->toArray()
            )->toArray();

            return Task::fromArray(
                $entityArray
            );
        });
    }
}
