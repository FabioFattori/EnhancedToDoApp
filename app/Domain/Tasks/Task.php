<?php

namespace App\Domain\Tasks;

use App\Domain\TaskCollections\TaskCollection;
use App\Domain\Tasks\Enums\TaskSeverities;
use App\Domain\Tasks\Enums\TaskStatus;
use App\Domain\Users\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin Builder<$this>
 *
 * @method static Builder<$this>|static query()
 * @method static Builder<$this>|static whereId(string $id)
 * @method static Builder<$this>|static whereTitle(string $title)
 * @method static Builder<$this>|static whereDescription(string $description)
 * @method static Builder<$this>|static whereDueDate(Carbon $date)
 * @method static Builder<$this>|static whereSeverity(TaskSeverities $severity)
 * @method static Builder<$this>|static whereStatus(TaskStatus $status)
 */
class Task extends Model
{
    use HasUuids;

    protected $table = 'tasks';
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'severity',
        'status',
        'owner_id',
        'worker_id',
        'task_collection_id'
    ];

    /** @var string[] $casts */
    protected $casts = [
        'severity' => TaskSeverities::class,
        'due_date' => Carbon::class,
        'status' => TaskStatus::class,
    ];

    /**
     * Get the creator of the Task
     * @return BelongsTo<User, $this>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the collection in which the task takes part
     * @return BelongsTo<TaskCollection, $this>
     */
    public function task_collection(): BelongsTo
    {
        return $this->belongsTo(TaskCollection::class, 'task_collection_id');
    }

    /**
     * Get the worker currently working to the Task
     * @return BelongsTo<User, $this>
     */
    public function worker() : BelongsTo
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
}
