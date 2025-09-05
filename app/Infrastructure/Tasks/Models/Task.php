<?php

namespace App\Infrastructure\Tasks\Models;

use App\Domain\Tasks\Enums\TaskSeverities;
use App\Domain\Tasks\Enums\TaskStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

readonly class Task
{
    public function __construct(
        private string $uuid,
        private string $title,
        private string $description,
        private Carbon $dueDate,
        private TaskSeverities $severity,
        private TaskStatus $status,
        private string $ownerId,
        private string $workerId,
        private string $taskCollectionId
    ) {
    }

    public function getUuid(): string
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

    public function getDueDate(): Carbon
    {
        return $this->dueDate;
    }

    public function getSeverity(): TaskSeverities
    {
        return $this->severity;
    }

    public function getStatus(): TaskStatus
    {
        return $this->status;
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
     *      uuid: string,
     *     title: string,
     *     description: string,
     *     due_date: Carbon,
     *     severity: TaskSeverities,
     *     status: TaskStatus,
     *     owner_id: string,
     *     worker_id: string,
     *     task_collection_id: string
     * }
     */
    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->dueDate,
            'severity' => $this->severity,
            'status' => $this->status,
            'owner_id' => $this->ownerId,
            'worker_id' => $this->workerId,
            'task_collection_id' => $this->taskCollectionId
        ];
    }

    /**
     * @param array{
     *     uuid: string,
     *      title: string,
     *      description: string,
     *      due_date: Carbon,
     *      severity: TaskSeverities,
     *      status: TaskStatus,
     *      owner_id: string,
     *      worker_id: string,
     *      task_collection_id: string
     *  } $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            uuid: $data['uuid'],
            title: $data['title'],
            description: $data['description'],
            dueDate: Carbon::parse($data['due_date']),
            severity: $data['severity'],
            status: $data['status'],
            ownerId: $data['owner_id'],
            workerId: $data['worker_id'],
            taskCollectionId: $data['task_collection_id']
        );
    }
}
