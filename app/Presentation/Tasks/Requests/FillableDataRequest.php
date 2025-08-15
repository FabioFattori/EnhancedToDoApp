<?php

namespace App\Presentation\Tasks\Requests;

use App\Domain\Tasks\Enums\TaskSeverities;
use App\Domain\Tasks\Enums\TaskStatus;
use Carbon\Carbon;

readonly class FillableDataRequest
{
    public function __construct(
        private string|null    $uuid,
        private string         $title,
        private string         $description,
        private TaskSeverities $severity,
        private TaskStatus     $status,
        private Carbon         $dueDate,
        private string         $ownerId,
        private string         $workerId,
        private string         $taskCollectionId
    )
    {
    }

    public function getUuid(): string|null
    {
        return $this->uuid;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSeverity(): TaskSeverities
    {
        return $this->severity;
    }

    public function getStatus(): TaskStatus
    {
        return $this->status;
    }

    public function getDueDate(): Carbon
    {
        return $this->dueDate;
    }

    public function getOwnerId(): string
    {
        return $this->ownerId;
    }

    public function getWorkerId(): string
    {
        return $this->workerId;
    }

    public function getTaskCollectionId(): string
    {
        return $this->taskCollectionId;
    }

    /**
     * @return array{
     *    title: string,
     *    description: string,
     *    due_date: Carbon,
     *    severity: TaskSeverities,
     *    status: TaskStatus,
     *    owner_id: string,
     *    worker_id: string,
     *    task_collection_id: string
     * }
     */
    public function toArrayModel(): array
    {
        return [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'severity' => $this->getSeverity(),
            'status' => $this->getStatus(),
            'due_date' => $this->getDueDate(),
            'owner_id' => $this->getOwnerId(),
            'worker_id' => $this->getWorkerId(),
            'task_collection_id' => $this->getTaskCollectionId(),
        ];
    }
}
