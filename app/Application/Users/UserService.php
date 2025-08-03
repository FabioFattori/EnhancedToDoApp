<?php

namespace App\Application\Users;

use App\Application\Users\Contracts\UserServiceContract;
use App\Infrastructure\Users\Models\User;
use App\Infrastructure\Users\Repositories\Contracts\UsersRepositoryContract;
use App\Domain\Users\User as Entity;
use Illuminate\Support\Collection;

readonly class UserService implements UserServiceContract
{
    public function __construct(
        private UsersRepositoryContract $usersRepository
    )
    {
    }

    public function create(User $userModel): void
    {
        $this->usersRepository->create($userModel);
    }

    public function update(User $userModel): void
    {
        $this->usersRepository->update($userModel);
    }

    public function delete(string $uuid): void
    {
        $this->usersRepository->delete($uuid);
    }

    public function show(string $uuid): Entity|null
    {
        return $this->usersRepository->show($uuid);
    }

    public function all(): Collection
    {
        return $this->usersRepository->all();
    }
}
