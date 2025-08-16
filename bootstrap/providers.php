<?php


use App\Presentation\Tasks\ServiceProviders\TasksServiceProvider;
use App\Presentation\Users\ServiceProviders\UserAppServiceProvider;

return [
    UserAppServiceProvider::class,
    TasksServiceProvider::class,
    App\Presentation\TaskCollections\ServiceProviders\TaskCollectionServiceProvider::class,
    App\Presentation\UserTaskCollections\ServiceProviders\UserTaskCollectionServiceProvider::class
];
