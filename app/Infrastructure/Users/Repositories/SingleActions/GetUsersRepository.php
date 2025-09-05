<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;

use App\Domain\Users\User as Entity;
use Illuminate\Support\Collection;
use App\Infrastructure\Users\Models\User as UserModel;

class GetUsersRepository
{
    public function getByUuid(string $Uuid): UserModel | null
    {
        /** @var Entity|null $retrievedEntity */
        $retrievedEntity = Entity::whereId($Uuid);

        if (!$retrievedEntity) {
            return null;
        }

        /** @var array{ uuid: string, name: string, email: string, password: string } $entityArray */
        $entityArray = $retrievedEntity->toArray();

        return UserModel::fromArray(
            $entityArray
        );
    }

    /**
     * @return Collection<int, UserModel>
     */
    public function getAll(): Collection
    {
        return Entity::all()->map(function ($singleEntity) {
            /** @var array{ uuid: string, name: string, email: string, password: string } $entityArray */
            $entityArray = $singleEntity->toArray();

            return UserModel::fromArray(
                $entityArray
            );
        });
    }
}
