<?php

namespace App\Infrastructure\Users\Repositories;

use App\Domain\Users\User;
use App\Infrastructure\Users\Models\User as Model;
use App\Infrastructure\Users\Repositories\Contracts\UsersRepositoryContract;
use App\Infrastructure\Users\Repositories\SingleActions\CreateUsersRepository;
use App\Infrastructure\Users\Repositories\SingleActions\DestroyUsersRepository;
use App\Infrastructure\Users\Repositories\SingleActions\GetUsersRepository;
use App\Infrastructure\Users\Repositories\SingleActions\UpdateUsersRepository;
use Illuminate\Support\Collection;
use Throwable;

readonly class UsersRepository implements UsersRepositoryContract
{
    public function __construct(
        private CreateUsersRepository $createUserRepository = new CreateUsersRepository(),
        private GetUsersRepository $getUserRepository = new GetUsersRepository(),
        private UpdateUsersRepository $updateUserRepository = new UpdateUsersRepository(),
        private DestroyUsersRepository $destroyUserRepository = new DestroyUsersRepository(),
    ) {
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
    public function update(string $uuid, Model $userModel): void
    {
        $this->updateUserRepository->update($uuid, $userModel);
    }

    /**
     * @throws Throwable
     */
    public function delete(string $uuid): void
    {
        $this->destroyUserRepository->destroy($uuid);
    }

    public function show(string $uuid): Model|null
    {
        return $this->getUserRepository->getByUuid($uuid);
    }

    /**
     * @return Collection<int, Model>
     */
    public function all(): Collection
    {
        return $this->getUserRepository->getAll();
    }
}
