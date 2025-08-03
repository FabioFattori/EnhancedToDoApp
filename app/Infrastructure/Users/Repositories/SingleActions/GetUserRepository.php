<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;

use App\Domain\Users\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Users\Models\User as UserModel;
class GetUserRepository
{
    public function getByUuid(string $Uuid) : User | null
    {
        return User::query()->whereId($Uuid);
    }

    public function getByModel(UserModel $Model) : User | null
    {
        return User::query()
            ->whereEmail($Model->getEmail())
            ->whereName($Model->getName());
    }

    /**
     * @return Collection<User>
     */
    public function getAll() : Collection
    {
        return User::all();
    }
}
