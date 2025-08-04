<?php

namespace App\Presentation\Users\ServiceProviders;

use App\Application\Users\Contracts\UserServiceContract;
use App\Application\Users\UserService;
use App\Infrastructure\Users\Repositories\UsersRepository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class UserAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserServiceContract::class, function (Application $app){
            return new UserService(new UsersRepository());
        });
    }

    /**
     * Bootstrap any application services.
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $this->app->make(UserServiceContract::class);
    }
}
