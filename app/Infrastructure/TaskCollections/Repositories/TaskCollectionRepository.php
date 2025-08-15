<?php

namespace App\Infrastructure\TaskCollections\Repositories;

use App\Infrastructure\TaskCollections\Models\TaskCollection as Model;
use App\Infrastructure\TaskCollections\Repositories\Contracts\TaskCollectionRepositoryContract;
use App\Infrastructure\TaskCollections\Repositories\SingleActions\CreateTaskCollectionRepository;
use App\Infrastructure\TaskCollections\Repositories\SingleActions\DestroyTaskCollectionRepository;
use App\Infrastructure\TaskCollections\Repositories\SingleActions\GetTaskCollectionRepository;
use App\Infrastructure\TaskCollections\Repositories\SingleActions\UpdateTaskCollectionRepository;
use Illuminate\Support\Collection;
use Throwable;

readonly class TaskCollectionRepository implements TaskCollectionRepositoryContract
{
    public function __construct(
        private CreateTaskCollectionRepository $createTaskCollectionRepository = new CreateTaskCollectionRepository(),
        private UpdateTaskCollectionRepository $updateTaskCollectionRepository = new UpdateTaskCollectionRepository(),
        private GetTaskCollectionRepository $getTaskCollectionRepository = new GetTaskCollectionRepository(),
        private DestroyTaskCollectionRepository $destroyTaskCollectionRepository = new DestroyTaskCollectionRepository(),
    ) {
    }

    /**
     * @throws Throwable
     */
    public function create(Model $model): void
    {
        $this->createTaskCollectionRepository->create($model);
    }

    /**
     * @throws Throwable
     */
    public function update(string $uuid, Model $model): void
    {
        $this->updateTaskCollectionRepository->update($uuid, $model);
    }

    /**
     * @throws Throwable
     */
    public function destroy(string $uuid): void
    {
        $this->destroyTaskCollectionRepository->destroy($uuid);
    }

    public function show(string $uuid): Model|null
    {
        return $this->getTaskCollectionRepository->show($uuid);
    }

    public function all(): Collection
    {
        return $this->getTaskCollectionRepository->all();
    }
}
