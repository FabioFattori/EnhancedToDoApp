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
     * @param Model $model
     * @return Model
     * @throws Throwable
     */
    public function create($model): Model
    {
        return $this->createTaskCollectionRepository->create($model);
    }

    /**
     * @param string $uuid
     * @param Model $model
     * @return Model
     * @throws Throwable
     */
    public function update(string $uuid, $model): Model
    {
        return $this->updateTaskCollectionRepository->update($uuid, $model);
    }

    /**
     * @param string $uuid
     * @throws Throwable
     */
    public function delete(string $uuid): void
    {
        $this->destroyTaskCollectionRepository->destroy($uuid);
    }

    /**
     * @param string $uuid
     * @return Model|null
     */
    public function show(string $uuid): Model|null
    {
        return $this->getTaskCollectionRepository->show($uuid);
    }

    /**
     * @return Collection<int, Model>
     */
    public function all(): Collection
    {
        return $this->getTaskCollectionRepository->all();
    }
}
