<?php

namespace App\Infrastructure\Users\Repositories;

use App\Domain\Users\User as Entity;
use App\Infrastructure\Users\Models\User as Model;
use App\Infrastructure\Users\Repositories\Contracts\UsersRepositoryContract;
use App\Infrastructure\Users\Repositories\SingleActions\CreateUserRepository;
use App\Infrastructure\Users\Repositories\SingleActions\DestroyUserRepository;
use App\Infrastructure\Users\Repositories\SingleActions\GetUserRepository;
use App\Infrastructure\Users\Repositories\SingleActions\UpdateUserRepository;
use Illuminate\Support\Collection;
use Throwable;

readonly class UsersRepository implements UsersRepositoryContract
{
    public function __construct(
        private CreateUserRepository $createUserRepository,
        private UpdateUserRepository $updateUserRepository,
        private GetUserRepository $getUserRepository,
        private DestroyUserRepository $destroyUserRepository,
    )
    {
    }

    /**
     * @throws Throwable
     */
    public function create(Model $userModel): void
    {
        $this->createUserRepository->create($userModel);
    }

    /**
     * @throws Throwable
     */
    public function update(Model $userModel): void
    {
        $this->updateUserRepository->update($userModel);
    }

    /**
     * @throws Throwable
     */
    public function delete(string $uuid): void
    {
        $this->destroyUserRepository->destroy($uuid);
    }

    public function show(string $uuid): Entity|null
    {
        return $this->getUserRepository->getByUuid($uuid);
    }

    public function all(): Collection
    {
        return $this->getUserRepository->getAll();
    }
}
