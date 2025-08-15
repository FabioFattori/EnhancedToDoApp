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
    )
    {
    }

    public function show(UuidRequest $request) : string|false
    {
        return json_encode($this->userService->show($request->getUuid())?->toArray());
    }

    public function destroy(UuidRequest $request): RedirectResponse
    {
        $this->userService->delete($request->getUuid());

        return redirect()->back();
    }

    public function create(FillableDataRequest $request) : RedirectResponse
    {
        $this->userService->create(
            User::fromArray($request->toArrayModel())
        );

        return redirect()->back();
    }

    public function update(FillableDataRequest $request) : RedirectResponse
    {
        if(!$request->getUuid()){
            return redirect()->back()->withErrors(['uuid' => 'uuid is required']);
        }

        $this->userService->update(
            uuid: $request->getUuid(),
            userModel: User::fromArray($request->toArrayModel()),
        );

        return redirect()->back();
    }

    public function all(): string
    {
        return $this->userService->all()->toJson();
    }
}
