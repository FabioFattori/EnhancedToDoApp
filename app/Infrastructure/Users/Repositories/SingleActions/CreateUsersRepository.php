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
    function create(User $userModel): User
    {
        /** @var User */
        return DB::transaction(function () use ($userModel) {
            $attributes = $userModel->toArray();
            $attributes['password'] = Hash::make($attributes['password']);
            /** @var array{ uuid?: string|null ,name: string, email: string, password: string } $entityArray */
            $entityArray =  Entity::create($attributes)->toArray();

            return User::fromArray(
                $entityArray
            );
        });
    }
}
