<?php

namespace App\Infrastructure\Tasks\Repositories\SingleActions;

use App\Domain\Tasks\Task;
use App\Infrastructure\Tasks\Models\Task as Model;
use Illuminate\Support\Collection;

class GetTasksRepository
{
    public function getByUuid(string $Uuid) : Model | null
    {
        /** @var Task|null $retrievedEntity */
        $retrievedEntity = Task::query()->whereId($Uuid);

        if(!$retrievedEntity){
            return null;
        }

        return Model::fromArray(
            $retrievedEntity->toArray()
        );
    }

    /**
     * @return Collection<Model>
     */
    public function getAll() : Collection
    {
        return Task::all()->map(function ($singleEntity){
            return Model::fromArray(
                $singleEntity
                    ->toArray()
            );
        });
    }
}
