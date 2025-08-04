<?php

namespace App\Infrastructure\Tasks\Repositories\Contracts;

use App\Infrastructure\Tasks\Models\Task as Model;
use Illuminate\Support\Collection;

interface TasksRepositoryContract
{
    public function create(Model $model): void;

    public function update(string $uuid, Model $model): void;

    public function destroy(string $uuid): void;

    public function show(string $uuid): Model|null;

    /**
     * @return Collection<Model>
     */
    public function all(): Collection;
}
