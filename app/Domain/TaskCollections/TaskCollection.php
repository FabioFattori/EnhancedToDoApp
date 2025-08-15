<?php

namespace App\Domain\TaskCollections;

use App\Domain\Tasks\Task;
use App\Domain\Users\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Builder<$this>
 *
 * @method static Builder<$this>|static query()
 * @method static Builder<$this>|static whereId(string $uuid)
 * @method static Builder<$this>|static whereTitle(string $title)
 * @method static Builder<$this>|static whereCreatorId(string $creator_id)
 * @method static Builder<$this>|static whereDescription(string $description)
 */
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
     * @return HasMany<Task, $this>
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the creator of the collection
     * @return BelongsTo<User, $this>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
