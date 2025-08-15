<?php

namespace App\Presentation\TaskCollections\ServiceProviders;

use App\Application\TaskCollections\Contracts\TaskCollectionServiceContract;
use App\Application\TaskCollections\TaskCollectionService;
use App\Infrastructure\TaskCollections\Repositories\TaskCollectionRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class TaskCollectionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            TaskCollectionServiceContract::class,
            fn(Application $app) => new TaskCollectionService(new TaskCollectionRepository())
        );
    }

    public function boot(): void
    {
        $this->app->make(TaskCollectionServiceContract::class);
    }
}
