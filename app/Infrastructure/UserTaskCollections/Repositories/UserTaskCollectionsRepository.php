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
     * @throws Throwable
     */
    public function create(UserTaskCollection $userTaskCollection): void
    {
        $this->createUserTaskCollectionRepository->create($userTaskCollection);
    }

    /**
     * @throws Throwable
     */
    public function update(string $uuid, UserTaskCollection $userTaskCollection): void
    {
        $this->updateUserTaskCollectionRepository->update($uuid, $userTaskCollection);
    }

    /**
     * @throws Throwable
     */
    public function destroy(string $uuid): void
    {
        $this->destroyUserTaskCollectionRepository->destroy($uuid);
    }

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
