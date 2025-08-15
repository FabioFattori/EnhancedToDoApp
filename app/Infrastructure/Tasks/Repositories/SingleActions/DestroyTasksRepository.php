<?php

namespace App\Infrastructure\Tasks\Repositories\SingleActions;

use App\Domain\Tasks\Task;
use Illuminate\Support\Facades\DB;
use Throwable;

class DestroyTasksRepository
{
    /**
     * @throws Throwable
     */
    public function destroy(string $uuid): void
    {
        DB::beginTransaction();
        try {
            Task::destroy([$uuid]);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
        }
    }
}
