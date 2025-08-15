<?php

namespace App\Infrastructure\TaskCollections\Repositories\Contracts;

use App\Infrastructure\TaskCollections\Models\TaskCollection as Model;
use Illuminate\Support\Collection;

interface TaskCollectionRepositoryContract
{
    public function create(Model $model): void;

    public function update(string $uuid, Model $model): void;

    public function destroy(string $uuid): void;

    public function show(string $uuid): Model|null;

    /**
     * @return Collection<int, Model>
     */
    public function all(): Collection;
}
