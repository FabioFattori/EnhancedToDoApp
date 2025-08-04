<?php

namespace App\Application\Tasks\Contracts;

use App\Infrastructure\Tasks\Models\Task;
use Illuminate\Support\Collection;

interface TasksServiceContract
{
    public function create(Task $task): void;
    public function update(string $uuid, Task $task): void;
    public function destroy(string $uuid): void;
    public function show(string $uuid): Task|null;

    /**
     * @return Collection<Task>
     */
    public function all(): Collection;
}
