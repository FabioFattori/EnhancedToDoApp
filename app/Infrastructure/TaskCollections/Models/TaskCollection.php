<?php

namespace App\Infrastructure\TaskCollections\Models;

use phpDocumentor\Reflection\DocBlock\Description;

readonly class TaskCollection
{
    public function __construct(
        private string $uuid,
        private string $title,
        private string $description,
        private string $creator_id,
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

    public function getCreatorId(): string
    {
        return $this->creator_id;
    }

    /**
     * @return array{ uuid: string,title: string, description: string, creator_id: string}
     */
    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'title' => $this->title,
            'description' => $this->description,
            'creator_id' => $this->creator_id,
        ];
    }

    /**
     * @param array{ uuid: string,title: string, description: string, creator_id: string} $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            uuid:$data['uuid'],
            title: $data['title'],
            description: $data['description'],
            creator_id: $data['creator_id'],
        );
    }
}
