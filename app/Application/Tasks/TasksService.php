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

    public function create(Task $task): void
    {
        $this->tasksRepository->create($task);
    }

    public function update(string $uuid, Task $task): void
    {
        $this->tasksRepository->update($uuid, $task);
    }

    public function destroy(string $uuid): void
    {
        $this->tasksRepository->destroy($uuid);
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
