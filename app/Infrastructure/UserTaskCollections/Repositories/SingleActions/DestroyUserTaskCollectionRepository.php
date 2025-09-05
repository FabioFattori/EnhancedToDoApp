<?php

namespace App\Infrastructure\UserTaskCollections\Repositories\SingleActions;

use App\Domain\UserTaskCollections\UserTaskCollection as Entity;
use Illuminate\Support\Facades\DB;
use Throwable;

class DestroyUserTaskCollectionRepository
{
    /**
     * @throws Throwable
     */
    public function destroy(string $uuid): void
    {
        DB::transaction(function () use ($uuid) {
            Entity::whereId($uuid)->delete();
        });
    }
}
