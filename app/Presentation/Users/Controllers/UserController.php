<?php

namespace App\Presentation\Users\Controllers;

use App\Application\Users\Contracts\UserServiceContract;
use App\Infrastructure\Users\Models\User;
use App\Presentation\Users\Requests\FillableDataRequest;
use App\Presentation\Users\Requests\UuidRequest;
use Illuminate\Http\RedirectResponse;

readonly class UserController
{
    public function __construct(
        private UserServiceContract $userService
    ) {
    }
}
