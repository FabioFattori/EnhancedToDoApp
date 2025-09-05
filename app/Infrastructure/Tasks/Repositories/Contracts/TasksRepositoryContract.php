<?php

namespace App\Infrastructure\Tasks\Repositories\Contracts;

use App\Infrastructure\Common\Contracts\BaseRepositoryContract;
use App\Infrastructure\Tasks\Models\Task as Model;
use Illuminate\Support\Collection;

/**
 * @extends BaseRepositoryContract<Model>
 */
interface TasksRepositoryContract extends BaseRepositoryContract
{
}
