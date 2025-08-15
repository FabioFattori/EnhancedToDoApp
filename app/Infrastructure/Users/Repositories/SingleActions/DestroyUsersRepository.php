<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;

use App\Domain\Users\User;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class DestroyUsersRepository
{
    /**
     * @throws Throwable
     */
    public function destroy(string $uuid): void
    {
        DB::beginTransaction();
        try {
            User::destroy([$uuid]);
            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
        }
    }
}
