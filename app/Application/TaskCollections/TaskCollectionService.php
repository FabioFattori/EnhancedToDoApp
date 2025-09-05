<?php

namespace App\Application\TaskCollections;

use App\Application\TaskCollections\Contracts\TaskCollectionServiceContract;
use App\Infrastructure\TaskCollections\Models\TaskCollection as Model;
use App\Infrastructure\TaskCollections\Repositories\Contracts\TaskCollectionRepositoryContract;
use Illuminate\Support\Collection;

readonly class TaskCollectionService implements TaskCollectionServiceContract
{
    public function __construct(
        private TaskCollectionRepositoryContract $taskCollectionRepository
    ) {
    }

    /**
     * @param Model $model
     * @return Model
     */
    public function create($model): Model
    {
        return $this->taskCollectionRepository->create($model);
    }

    /**
     * @param string $uuid
     * @param Model $model
     * @return Model
     */
    public function update(string $uuid, $model): Model
    {
        return $this->taskCollectionRepository->update($uuid, $model);
    }

    public function show(string $uuid): Model|null
    {
        return $this->taskCollectionRepository->show($uuid);
    }

    /**
     * @return Collection<int, Model>
     */
    public function all(): Collection
    {
        return $this->taskCollectionRepository->all();
    }

    public function delete(string $uuid): void
    {
        $this->taskCollectionRepository->delete($uuid);
    }
}
