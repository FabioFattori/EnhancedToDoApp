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
        DB::beginTransaction();
        try {
            Entity::whereId($uuid)->delete();
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
        }
    }
}
