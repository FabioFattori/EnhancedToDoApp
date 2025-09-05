<?php

namespace App\Application\Common\Repositories;

use Illuminate\Support\Collection;

/**
 * @template T
 */
interface BaseServiceContract
{
    /**
     * @param T $model
     * @return T
     */
    public function create($model);

    /**
     * @param string $uuid
     * @param T $model
     * @return T
     */
    public function update(string $uuid, $model);

    /**
     * @param string $uuid
     * @return void
     */
    public function delete(string $uuid): void;

    /**
     * @param string $uuid
     * @return T | null
     */
    public function show(string $uuid);

    /**
     * @return Collection<int, T>
     */
    public function all(): Collection;
}
