<?php

namespace App\Infrastructure\UserTaskCollections\Models;

use App\Domain\UserTaskCollections\Enums\UserAbilities;

readonly class UserTaskCollection
{
    public function __construct(
        private string $uuid,
        private string $participator_id,
        private string $task_collection_id,
        private UserAbilities $ability,
    ) {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getParticipatorId(): string
    {
        return $this->participator_id;
    }

    public function getTaskCollectionId(): string
    {
        return $this->task_collection_id;
    }

    public function getAbility(): UserAbilities
    {
        return $this->ability;
    }

    /**
     * @return array{ uuid: string,participator_id: string, task_collection_id: string, ability: UserAbilities }
     */
    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'participator_id' => $this->participator_id,
            'task_collection_id' => $this->task_collection_id,
            'ability' => $this->ability
        ];
    }

    /**
     * @param array{ uuid: string,participator_id: string, task_collection_id: string, ability: UserAbilities } $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['uuid'],
            $data["participator_id"],
            $data["task_collection_id"],
            $data["ability"]
        );
    }
}
