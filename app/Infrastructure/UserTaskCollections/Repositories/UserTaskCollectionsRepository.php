<?php

namespace App\Infrastructure\UserTaskCollections\Repositories;

use App\Infrastructure\UserTaskCollections\Models\UserTaskCollection;
use App\Infrastructure\UserTaskCollections\Repositories\Contracts\UserTaskCollectionsRepositoryContract;
use App\Infrastructure\UserTaskCollections\Repositories\SingleActions\CreateUserTaskCollectionRepository;
use App\Infrastructure\UserTaskCollections\Repositories\SingleActions\DestroyUserTaskCollectionRepository;
use App\Infrastructure\UserTaskCollections\Repositories\SingleActions\GetUserTaskCollectionRepository;
use App\Infrastructure\UserTaskCollections\Repositories\SingleActions\UpdateUserTaskCollectionRepository;
use Illuminate\Support\Collection;
use Throwable;

readonly class UserTaskCollectionsRepository implements UserTaskCollectionsRepositoryContract
{
    public function __construct(
        private GetUserTaskCollectionRepository $getUserTaskCollectionRepository = new GetUserTaskCollectionRepository(
        ),
        private UpdateUserTaskCollectionRepository $updateUserTaskCollectionRepository = new UpdateUserTaskCollectionRepository(
        ),
        private CreateUserTaskCollectionRepository $createUserTaskCollectionRepository = new CreateUserTaskCollectionRepository(
        ),
        private DestroyUserTaskCollectionRepository $destroyUserTaskCollectionRepository = new DestroyUserTaskCollectionRepository(
        ),
    ) {
    }

    /**
     * @param UserTaskCollection $model
     * @throws Throwable
     */
    public function create($model): UserTaskCollection
    {
        return $this->createUserTaskCollectionRepository->create($model);
    }

    /**
     * @param string $uuid
     * @param UserTaskCollection $model
     * @throws Throwable
     */
    public function update(string $uuid, $model): UserTaskCollection
    {
        return $this->updateUserTaskCollectionRepository->update($uuid, $model);
    }

    /**
     * @param string $uuid
     * @throws Throwable
     */
    public function delete(string $uuid): void
    {
        $this->destroyUserTaskCollectionRepository->destroy($uuid);
    }

    /**
     * @param string $uuid
     * @return UserTaskCollection|null
     */
    public function show(string $uuid): UserTaskCollection|null
    {
        return $this->getUserTaskCollectionRepository->show($uuid);
    }

    /**
     * @return Collection<int, UserTaskCollection>
     */
    public function all(): Collection
    {
        return $this->getUserTaskCollectionRepository->all();
    }
}
