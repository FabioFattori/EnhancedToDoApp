<?php

namespace App\Presentation\TaskCollections\Controllers;

use App\Application\TaskCollections\Contracts\TaskCollectionServiceContract;
use App\Presentation\TaskCollections\Requests\UuidRequest;

readonly class TaskCollectionController
{
    public function __construct(
        private TaskCollectionServiceContract $taskCollectionService
    )
    {
    }

    public function show(UuidRequest $uuidRequest) : string|false
    {
        return json_encode($this->taskCollectionService->show($uuidRequest->getUuid()));
    }
}
