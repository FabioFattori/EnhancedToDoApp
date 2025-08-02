<?php

namespace App\Domain\UserTaskCollections;

use App\Domain\TaskCollections\TaskCollection;
use App\Domain\Users\User;
use App\Domain\UserTaskCollections\Enums\UserAbilities;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTaskCollection extends Model
{
    use HasUuids;
    protected $table = 'user_task_collection';
    protected $fillable = [
        'participator_id',
        'task_collection_id',
        'ability'
    ];

    protected $casts = [
        'task_collection_id' => 'string',
        'ability' => UserAbilities::class,
        'participator_id' => 'string',
    ];

    /**
     * Get the user participating in the collection
     * @return BelongsTo
     */
    public function participator() : BelongsTo
    {
        return $this->belongsTo(User::class, 'participator_id');
    }

    /**
     * Get the collection in which the user is participating
     * @return BelongsTo
     */
    public function taskCollection() : BelongsTo
    {
        return $this->belongsTo(TaskCollection::class,'task_collection_id');
    }
}
