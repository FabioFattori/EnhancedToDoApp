<?php

namespace App\Application\Tasks;

use App\Application\Tasks\Contracts\TasksServiceContract;
use App\Infrastructure\Tasks\Models\Task;
use App\Infrastructure\Tasks\Repositories\Contracts\TasksRepositoryContract;
use Illuminate\Support\Collection;

readonly class TasksService implements TasksServiceContract
{
    public function __construct(
        private TasksRepositoryContract $tasksRepository
    ) {
    }

    /**
     * @param Task $model
     * @return Task
     */
    public function create($model): Task
    {
        return $this->tasksRepository->create($model);
    }

    /**
     * @param string $uuid
     * @param Task $model
     * @return Task
     */
    public function update(string $uuid, $model): Task
    {
        return $this->tasksRepository->update($uuid, $model);
    }

    public function delete(string $uuid): void
    {
        $this->tasksRepository->delete($uuid);
    }

    public function show(string $uuid): Task|null
    {
        return $this->tasksRepository->show($uuid);
    }

    /**
     * @return Collection<int, Task>
     */
    public function all(): Collection
    {
        return $this->tasksRepository->all();
    }
}
