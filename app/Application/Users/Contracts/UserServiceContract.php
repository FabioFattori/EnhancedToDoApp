<?php

namespace App\Application\Users\Contracts;

use App\Domain\Users\User as Entity;
use App\Infrastructure\Users\Models\User;
use Illuminate\Support\Collection;

interface UserServiceContract
{
    public function create(User $userModel): void;
    public function update(User $userModel): void;
    public function delete(string $uuid): void;
    public function show(string $uuid): Entity|null;
    /**
     * @return Collection<Entity>
     */
    public function all(): Collection;
}
