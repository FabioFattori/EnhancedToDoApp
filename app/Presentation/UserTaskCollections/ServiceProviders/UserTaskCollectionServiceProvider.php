<?php

namespace App\Presentation\UserTaskCollections\ServiceProviders;

use App\Application\UserTaskCollections\Contracts\UserTaskCollectionServiceContract;
use App\Application\UserTaskCollections\UserTaskCollectionService;
use App\Infrastructure\UserTaskCollections\Repositories\UserTaskCollectionsRepository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class UserTaskCollectionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            UserTaskCollectionServiceContract::class,
            fn(Application $app) => new UserTaskCollectionService(new UserTaskCollectionsRepository())
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $this->app->make(UserTaskCollectionServiceContract::class);
    }
}
