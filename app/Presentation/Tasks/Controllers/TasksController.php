<?php

namespace App\Presentation\Tasks\Controllers;

use App\Application\Tasks\Contracts\TasksServiceContract;
use App\Infrastructure\Tasks\Models\Task;
use App\Presentation\Tasks\Requests\FillableDataRequest;
use App\Presentation\Tasks\Requests\UuidRequest;
use Illuminate\Http\RedirectResponse;

readonly class TasksController
{
    public function __construct(
        private TasksServiceContract $tasksService
    )
    {
    }

    public function show(UuidRequest $request): string|false
    {
        return json_encode($this->tasksService->show($request->getUuid())?->toArray());
    }

    public function create(FillableDataRequest $request): RedirectResponse
    {
        $this->tasksService->create(
            Task::fromArray($request->toArrayModel())
        );

        return redirect()->back();
    }

    public function update(FillableDataRequest $request): RedirectResponse
    {
        if(!$request->getUuid()){
            return redirect()->back()->withErrors(['uuid' => 'uuid is required']);
        }

        $this->tasksService->update(
            uuid: $request->getUuid(),
            task: Task::fromArray($request->toArrayModel()),
        );

        return redirect()->back();
    }

    public function destroy(UuidRequest $request): RedirectResponse
    {
        $this->tasksService->destroy($request->getUuid());

        return redirect()->back();
    }

    public function all() : string
    {
        return $this->tasksService->all()->toJson();
    }
}
