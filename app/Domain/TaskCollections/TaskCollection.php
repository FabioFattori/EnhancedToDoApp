<?php

namespace App\Domain\TaskCollections;

use App\Domain\Tasks\Task;
use App\Domain\Users\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskCollection extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'creator_id',
        'description',
    ];

    /**
     * Get the tasks of the collection
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the creator of the collection
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
