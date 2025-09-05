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
     * @param Model $model
     * @return Model
     * @throws Throwable
     */
    public function create($model): Model
    {
        return $this->createUserRepository->create($model);
    }

    /**
     * @param string $uuid
     * @param Model $model
     * @return Model
     * @throws Throwable
     */
    public function update(string $uuid, $model): Model
    {
        return $this->updateUserRepository->update($uuid, $model);
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
