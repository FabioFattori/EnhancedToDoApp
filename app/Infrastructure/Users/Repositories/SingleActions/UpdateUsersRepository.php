<?php

namespace App\Infrastructure\Users\Repositories\SingleActions;

use App\Domain\Users\User as Entity;
use App\Infrastructure\Users\Models\User as Model;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

readonly class UpdateUsersRepository
{
    /**
     * @throws Throwable
     */
    public function update(string $uuid, Model $userModel): Model
    {
        return DB::transaction(function () use ($uuid, $userModel) {
            $attributes = $userModel->toArray();
            $attributes['password'] = Hash::make($attributes['password']);

            if (
                Entity::whereId($uuid)
                ->update($attributes)
            ) {
                return $userModel;
            }

            throw new Exception("User not updated");
        });
    }
}
