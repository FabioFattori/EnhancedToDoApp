<?php

namespace App\Application\Users\Contracts;

use App\Infrastructure\Users\Models\User;
use Illuminate\Support\Collection;

interface UserServiceContract
{
    public function create(User $userModel): void;
    public function update(string $uuid, User $userModel): void;
    public function delete(string $uuid): void;
    public function show(string $uuid): User|null;
    /**
     * @return Collection<int, User>
     */
    public function all(): Collection;
}
