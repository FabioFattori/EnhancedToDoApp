<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;


use App\Infrastructure\Users\Models\User;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateUserRepository
{
    /**
     * @throws Throwable
     */
    function create(User $userModel): void
    {
        DB::beginTransaction();
        try {
            new \App\Domain\Users\User([
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
