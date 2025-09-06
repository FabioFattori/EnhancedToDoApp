<?php

namespace App\Infrastructure\UserTaskCollections\Repositories\SingleActions;

use App\Domain\UserTaskCollections\UserTaskCollection as Entity;
use App\Infrastructure\UserTaskCollections\Models\UserTaskCollection as Model;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateUserTaskCollectionRepository
{
    /**
     * @throws Throwable
     */
    public function update(string $uuid, Model $userTaskCollection): Model
    {
        /** @var Model */
        return DB::transaction(function () use ($uuid, $userTaskCollection) {
            $result = Entity::whereId($uuid)->update($userTaskCollection->toArray());

            if ($result) {
                return $userTaskCollection;
            }

            throw new Exception("User Task Collection Update Failed");
        });
    }
}
