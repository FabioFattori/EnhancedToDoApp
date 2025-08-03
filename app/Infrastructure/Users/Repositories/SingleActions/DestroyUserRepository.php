<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;

use App\Domain\Users\User;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class DestroyUserRepository
{
    public function __construct(
        private GetUserRepository $getUserRepository,
    )
    {
    }

    /**
     * @throws Throwable
     */
    public function destroy(string $uuid): void
    {
        /** @var User|null $user */
        $user = $this->getUserRepository->getByUuid($uuid);

        if(!$user){
            return;
        }

        DB::beginTransaction();
        try {
            $user->delete();
        }catch (Throwable $exception){
            DB::rollBack();
        }
        DB::commit();
    }
}
