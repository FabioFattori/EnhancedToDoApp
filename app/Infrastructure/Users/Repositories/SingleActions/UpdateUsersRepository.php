<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;

use App\Domain\Users\User as Entity;
use App\Infrastructure\Users\Models\User as Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

readonly class UpdateUsersRepository
{
    /**
     * @throws Throwable
     */
    public function update(string $uuid, Model $userModel) : void
    {
        DB::beginTransaction();
        try {
            $attributes = $userModel->toArray();
            $attributes['password'] = Hash::make($attributes['password']);
            Entity::query()
                ->whereId($uuid)
                ->update($attributes);

            DB::commit();
        }catch (Throwable $exception){
            DB::rollBack();
        }
    }
}
