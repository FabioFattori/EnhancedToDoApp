<?php

namespace App\Infrastructure\Users\Repositories\Contracts;

use App\Infrastructure\Common\Contracts\BaseRepositoryContract;
use App\Infrastructure\Users\Models\User as Model;
use Illuminate\Support\Collection;

/**
 * @extends BaseRepositoryContract<Model>
 */
interface UsersRepositoryContract extends BaseRepositoryContract
{
}
