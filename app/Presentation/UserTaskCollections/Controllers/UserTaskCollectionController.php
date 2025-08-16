<?php

namespace App\Presentation\UserTaskCollections\Controllers;

use App\Application\UserTaskCollections\Contracts\UserTaskCollectionServiceContract;

readonly class UserTaskCollectionController
{
    public function __construct(
        private UserTaskCollectionServiceContract $userTaskCollectionService
    ) {
    }

    public function all(): string|false
    {
        return json_encode($this->userTaskCollectionService->all());
    }
}
