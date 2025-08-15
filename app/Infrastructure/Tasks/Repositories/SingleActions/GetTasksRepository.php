<?php

namespace App\Infrastructure\Tasks\Repositories\SingleActions;

use App\Domain\Tasks\Enums\TaskSeverities;
use App\Domain\Tasks\Enums\TaskStatus;
use App\Domain\Tasks\Task;
use App\Infrastructure\Tasks\Models\Task as Model;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class GetTasksRepository
{
    public function getByUuid(string $Uuid): Model|null
    {
        /** @var Task|null $retrievedEntity */
        $retrievedEntity = Task::whereId($Uuid);

        if (!$retrievedEntity) {
            return null;
        }

        /** @var array{
         * title: string,
         * description: string,
         * due_date: Carbon,
         * severity: TaskSeverities,
         * status: TaskStatus,
         * owner_id: string,
         * worker_id: string,
         * task_collection_id: string
         * } $entityArray
         */
        $entityArray = $retrievedEntity->toArray();

        return Model::fromArray(
            $entityArray
        );
    }

    /**
     * @return Collection<int, Model>
     */
    public function getAll(): Collection
    {
        return Task::all()
            ->map(
                function ($singleEntity) {
                    /** @var array{
                     * title: string,
                     * description: string,
                     * due_date: Carbon,
                     * severity: TaskSeverities,
                     * status: TaskStatus,
                     * owner_id: string,
                     * worker_id: string,
                     * task_collection_id: string
                     * } $entityArray
                     */
                    $entityArray = $singleEntity->toArray();

                    return Model::fromArray(
                        $entityArray
                    );
                }
            );
    }
}
