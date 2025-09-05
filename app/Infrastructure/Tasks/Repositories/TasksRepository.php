<?php

namespace App\Infrastructure\Tasks\Repositories;

use App\Infrastructure\Tasks\Models\Task;
use App\Infrastructure\Tasks\Repositories\Contracts\TasksRepositoryContract;
use App\Infrastructure\Tasks\Repositories\SingleActions\CreateTasksRepository;
use App\Infrastructure\Tasks\Repositories\SingleActions\DestroyTasksRepository;
use App\Infrastructure\Tasks\Repositories\SingleActions\GetTasksRepository;
use App\Infrastructure\Tasks\Repositories\SingleActions\UpdateTasksRepository;
use Illuminate\Support\Collection;
use Throwable;

readonly class TasksRepository implements TasksRepositoryContract
{
    public function __construct(
        private CreateTasksRepository $createTasksRepository = new CreateTasksRepository(),
        private UpdateTasksRepository $updateTasksRepository = new UpdateTasksRepository(),
        private DestroyTasksRepository $destroyTasksRepository = new DestroyTasksRepository(),
        private GetTasksRepository $getTasksRepository = new GetTasksRepository(),
    ) {
    }

    /**
     * @param Task $model
     * @return Task
     * @throws Throwable
     */
    public function create($model): Task
    {
        return $this->createTasksRepository->create($model);
    }

    /**
     * @param string $uuid
     * @param Task $model
     * @return Task
     * @throws Throwable
     */
    public function update(string $uuid, $model): Task
    {
        return $this->updateTasksRepository->update($uuid, $model);
    }

    /**
     * @param string $uuid
     * @throws Throwable
     */
    public function delete(string $uuid): void
    {
        $this->destroyTasksRepository->destroy($uuid);
    }

    /**
     * @param string $uuid
     * @return Task|null
     */
    public function show(string $uuid): Task|null
    {
        return $this->getTasksRepository->getByUuid($uuid);
    }

    /**
     * @return Collection<int, Task>
     */
    public function all(): Collection
    {
        return $this->getTasksRepository->getAll();
    }
}
