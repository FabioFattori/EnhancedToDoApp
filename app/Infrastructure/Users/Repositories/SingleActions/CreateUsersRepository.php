<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;

use App\Infrastructure\Users\Models\User;
use Illuminate\Support\Facades\DB;
use App\Domain\Users\User as Entity;
use Illuminate\Support\Facades\Hash;
use Throwable;

class CreateUsersRepository
{
    /**
     * @throws Throwable
     */
    function create(User $userModel): void
    {
        DB::beginTransaction();
        try {
            $attributes = $userModel->toArray();
            $attributes['password'] = Hash::make($attributes['password']);
            new Entity($attributes);
            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
        }
    }
}
