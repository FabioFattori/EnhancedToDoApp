<?php

namespace App\Infrastructure\Users\Repositories\Contracts;


use App\Infrastructure\Users\Models\User as Model;
use App\Domain\Users\User as Entity;
use Illuminate\Support\Collection;

interface UsersRepositoryContract
{
    public function create(Model $userModel): void;
    public function update(Model $userModel): void;
    public function delete(string $uuid): void;
    public function show(string $uuid): Entity|null;

    /**
     * @return Collection<Entity>
     */
    public function all(): Collection;
}
