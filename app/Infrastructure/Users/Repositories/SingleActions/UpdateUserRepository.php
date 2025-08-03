<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;

use App\Domain\Users\User;
use App\Infrastructure\Users\Models\User as Model;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class UpdateUserRepository
{
    public function __construct(
        private GetUserRepository $getUserRepository
    )
    {
    }

    /**
     * @throws Throwable
     */
    public function update(Model $userModel) : void
    {
        /** @var User|null $user */
        $user = $this->getUserRepository->getByModel($userModel);

        if (!$user) {
            return;
        }

        DB::beginTransaction();
        try {
            $user->update([
                'name' => $userModel->getName(),
                'email' => $userModel->getEmail(),
                'password' => password_hash($userModel->getPassword(), PASSWORD_DEFAULT)
            ]);
        }catch (Throwable $exception){
            DB::rollBack();
        }
        DB::commit();
    }
}
