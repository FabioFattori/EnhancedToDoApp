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

    public function destroy(string $uuid): void
    {
        $this->userTaskCollectionsRepository->destroy($uuid);
    }

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

    public function create(UserTaskCollection $userTaskCollection): void
    {
        $this->userTaskCollectionsRepository->create($userTaskCollection);
    }

    public function update(string $uuid, UserTaskCollection $userTaskCollection): void
    {
        $this->userTaskCollectionsRepository->update($uuid, $userTaskCollection);
    }
}
