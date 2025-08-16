<?php

namespace App\Application\UserTaskCollections\Contracts;

use App\Infrastructure\UserTaskCollections\Models\UserTaskCollection;
use Illuminate\Support\Collection;

interface UserTaskCollectionServiceContract
{
    public function destroy(string $uuid): void;

    public function show(string $uuid): UserTaskCollection|null;

    /**
     * @return Collection<int, UserTaskCollection>
     */
    public function all(): Collection;

    public function create(UserTaskCollection $userTaskCollection): void;

    public function update(string $uuid, UserTaskCollection $userTaskCollection): void;
}
