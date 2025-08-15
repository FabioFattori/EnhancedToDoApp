<?php

namespace App\Application\TaskCollections\Contracts;

use App\Infrastructure\TaskCollections\Models\TaskCollection;
use Illuminate\Support\Collection;

interface TaskCollectionServiceContract
{
    public function create(TaskCollection $taskCollection): void;

    public function update(string $uuid,TaskCollection $taskCollection): void;

    public function destroy(string $uuid): void;

    public function show(string $uuid): TaskCollection|null;

    /**
     * @return Collection<int, TaskCollection>
     */
    public function all(): Collection;
}
