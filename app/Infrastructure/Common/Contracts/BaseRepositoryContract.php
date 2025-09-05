<?php

namespace App\Infrastructure\Common\Contracts;

use Illuminate\Support\Collection;

/**
 * @template T
 */
interface BaseRepositoryContract
{
    /**
     * @param T $model
     * @return T
     */
    public function create($model);

    /**
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
