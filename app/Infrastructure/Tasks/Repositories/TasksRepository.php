<?php

namespace App\Infrastructure\Tasks\Repositories;

use App\Infrastructure\Tasks\Models\Task;
use App\Infrastructure\Tasks\Repositories\Contracts\TasksRepositoryContract;
use App\Infrastructure\Tasks\Repositories\SingleActions\CreateTasksRepository;
use App\Infrastructure\Tasks\Repositories\SingleActions\DestroyTasksRepository;
use App\Infrastructure\Tasks\Repositories\SingleActions\GetTasksRepository;
use App\Infrastructure\Tasks\Repositories\SingleActions\UpdateTasksRepository;
use App\Infrastructure\Users\Repositories\SingleActions\GetUsersRepository;
use Illuminate\Support\Collection;
use Throwable;

readonly class TasksRepository implements TasksRepositoryContract
{
    public function __construct(
        private CreateTasksRepository $createTasksRepository = new CreateTasksRepository(),
        private UpdateTasksRepository $updateTasksRepository = new UpdateTasksRepository(),
        private DestroyTasksRepository $destroyTasksRepository = new DestroyTasksRepository(),
        private GetTasksRepository $getTasksRepository = new GetTasksRepository(),
    )
    {
    }

    /**
     * @throws Throwable
     */
    public function create(Task $model): void
    {
        $this->createTasksRepository->create($model);
    }

    /**
     * @throws Throwable
     */
    public function update(string $uuid, Task $model): void
    {
        $this->updateTasksRepository->update($uuid, $model);
    }

    /**
     * @throws Throwable
     */
    public function destroy(string $uuid): void
    {
        $this->destroyTasksRepository->destroy($uuid);
    }

    public function show(string $uuid): Task|null
    {
        return $this->getTasksRepository->getByUuid($uuid);
    }

    /**
     * @return Collection<Task>
     */
    public function all(): Collection
    {
        return $this->getTasksRepository->getAll();
    }
}
