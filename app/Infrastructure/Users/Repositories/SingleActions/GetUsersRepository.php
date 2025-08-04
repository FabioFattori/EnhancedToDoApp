<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;

use App\Domain\Users\User as Entity;
use Illuminate\Database\Eloquent\Collection;
use App\Infrastructure\Users\Models\User as UserModel;
class GetUsersRepository
{
    public function getByUuid(string $Uuid) : UserModel | null
    {
        /** @var Entity|null $retrievedEntity */
        $retrievedEntity = Entity::query()->whereId($Uuid);

        if(!$retrievedEntity){
            return null;
        }

        return UserModel::fromArray(
            $retrievedEntity->toArray()
        );
    }

    /**
     * @return Collection<UserModel>
     */
    public function getAll() : Collection
    {
        return Entity::all()->map(function ($singleEntity){
            return UserModel::fromArray(
                $singleEntity
                    ->toArray()
            );
        });
    }
}
