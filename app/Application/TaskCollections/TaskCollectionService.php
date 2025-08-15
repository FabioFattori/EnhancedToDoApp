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


    public function create(Model $taskCollection): void
    {
        $this->taskCollectionRepository->create($taskCollection);
    }

    public function update(string $uuid, Model $taskCollection): void
    {
        $this->taskCollectionRepository->update($uuid, $taskCollection);
    }

    public function destroy(string $uuid): void
    {
        $this->taskCollectionRepository->destroy($uuid);
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
}
