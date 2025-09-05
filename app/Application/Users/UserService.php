<?php

namespace App\Application\Users;

use App\Application\Users\Contracts\UserServiceContract;
use App\Infrastructure\Users\Models\User;
use App\Infrastructure\Users\Repositories\Contracts\UsersRepositoryContract;
use Illuminate\Support\Collection;

readonly class UserService implements UserServiceContract
{
    public function __construct(
        private UsersRepositoryContract $usersRepository
    ) {
    }

    public function create($model): User
    {
        return $this->usersRepository->create($model);
    }

    public function update(string $uuid, $model): User
    {
        return $this->usersRepository->update($uuid, $model);
    }

    public function delete(string $uuid): void
    {
        $this->usersRepository->delete($uuid);
    }

    public function show(string $uuid): User|null
    {
        return $this->usersRepository->show($uuid);
    }

    /**
     * @return Collection<int, User>
     */
    public function all(): Collection
    {
        return $this->usersRepository->all();
    }
}
