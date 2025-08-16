<?php

namespace App\Infrastructure\UserTaskCollections\Repositories\Contracts;

use App\Infrastructure\UserTaskCollections\Models\UserTaskCollection;
use Illuminate\Support\Collection;

interface UserTaskCollectionsRepositoryContract
{
    public function create(UserTaskCollection $userTaskCollection): void;

    public function update(string $uuid, UserTaskCollection $userTaskCollection): void;

    public function destroy(string $uuid): void;

    public function show(string $uuid): UserTaskCollection|null;

    /**
     * @return Collection<int, UserTaskCollection>
     */
    public function all(): Collection;
}
