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
    ) {
    }
}
