<?php

namespace App\Presentation\Users\Controllers;


use App\Application\Users\Contracts\UserServiceContract;
use App\Infrastructure\Users\Models\User;
use App\Presentation\Users\Requests\FillableDataRequest;
use App\Presentation\Users\Requests\UuidRequest;

readonly class UserController
{
    public function __construct(
        private UserServiceContract $userService
    )
    {
    }

    public function show(UuidRequest $request) : string
    {
        return $this->userService->show($request->getUuid());
    }

    public function destroy(UuidRequest $request) : string
    {
        $this->userService->delete($request->getUuid());

        return "Done";
    }

    public function create(FillableDataRequest $request) : string
    {
        $this->userService->create(
            User::fromArray($request->toArray())
        );

        return "Done";
    }

    public function update(FillableDataRequest $request) : string
    {
        $this->userService->update(
            User::fromArray($request->toArray()),
        );

        return "Done";
    }

    public function all(): string
    {
        return $this->userService->all()->toJson();
    }
}
