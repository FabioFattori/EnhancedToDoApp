<?php

namespace App\Application\UserTaskCollections;

use App\Application\UserTaskCollections\Contracts\UserTaskCollectionServiceContract;
use App\Infrastructure\UserTaskCollections\Models\UserTaskCollection;
use App\Infrastructure\UserTaskCollections\Repositories\Contracts\UserTaskCollectionsRepositoryContract;
use Illuminate\Support\Collection;

readonly class UserTaskCollectionService implements UserTaskCollectionServiceContract
{
    public function __construct(
        private UserTaskCollectionsRepositoryContract $userTaskCollectionsRepository,
    ) {
    }

    /**
     * @param string $uuid
     * @return void
     */
    public function delete(string $uuid): void
    {
        $this->userTaskCollectionsRepository->delete($uuid);
    }

    /**
     * @param string $uuid
     * @return UserTaskCollection|null
     */
    public function show(string $uuid): UserTaskCollection|null
    {
        return $this->userTaskCollectionsRepository->show($uuid);
    }

    /**
     * @return Collection<int, UserTaskCollection>
     */
    public function all(): Collection
    {
        return $this->userTaskCollectionsRepository->all();
    }

    /**
     * @param $model
     * @return UserTaskCollection
     */
    public function create($model): UserTaskCollection
    {
        return $this->userTaskCollectionsRepository->create($model);
    }

    /**
     * @param string $uuid
     * @param UserTaskCollection $model
     * @return UserTaskCollection
     */
    public function update(string $uuid, $model): UserTaskCollection
    {
        return $this->userTaskCollectionsRepository->update($uuid, $model);
    }
}
