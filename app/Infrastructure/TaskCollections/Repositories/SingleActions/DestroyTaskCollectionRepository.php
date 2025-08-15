<?php

namespace App\Infrastructure\TaskCollections\Repositories\SingleActions;

use App\Domain\TaskCollections\TaskCollection as Entity;
use Illuminate\Support\Facades\DB;
use Throwable;

class DestroyTaskCollectionRepository
{
    /**
     * @throws Throwable
     */
    public function destroy(string $uuid) : void
    {
        DB::beginTransaction();
        try {
            Entity::destroy([$uuid]);
            DB::commit();
        }catch (Throwable $exception){
            DB::rollBack();
        }
    }
}
