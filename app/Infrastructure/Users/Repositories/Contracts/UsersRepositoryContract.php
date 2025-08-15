<?php

namespace App\Infrastructure\Users\Repositories\Contracts;

use App\Infrastructure\Users\Models\User as Model;
use Illuminate\Support\Collection;

interface UsersRepositoryContract
{
    public function create(Model $userModel): void;
    public function update(string $uuid, Model $userModel): void;
    public function delete(string $uuid): void;
    public function show(string $uuid): Model|null;

    /**
     * @return Collection<int, Model>
     */
    public function all(): Collection;
}
