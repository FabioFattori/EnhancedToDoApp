<?php

namespace App\Presentation\Tasks\ServiceProviders;

use App\Application\Tasks\Contracts\TasksServiceContract;
use App\Application\Tasks\TasksService;
use App\Infrastructure\Tasks\Repositories\TasksRepository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class TasksServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TasksServiceContract::class, function (Application $app){
            return new TasksService(new TasksRepository());
        });
    }

    /**
     * Bootstrap any application services.
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $this->app->make(TasksServiceContract::class);
    }
}
