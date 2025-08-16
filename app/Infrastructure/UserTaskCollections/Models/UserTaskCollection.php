<?php

namespace App\Infrastructure\UserTaskCollections\Models;

use App\Domain\UserTaskCollections\Enums\UserAbilities;

readonly class UserTaskCollection
{
    public function __construct(
        private string $participator_id,
        private string $task_collection_id,
        private UserAbilities $ability,
    ) {
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
     * @return array{ participator_id: string, task_collection_id: string, ability: UserAbilities }
     */
    public function toArray(): array
    {
        return [
            'participator_id' => $this->participator_id,
            'task_collection_id' => $this->task_collection_id,
            'ability' => $this->ability
        ];
    }

    /**
     * @param array{ participator_id: string, task_collection_id: string, ability: UserAbilities } $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data["participator_id"],
            $data["task_collection_id"],
            $data["ability"]
        );
    }
}
