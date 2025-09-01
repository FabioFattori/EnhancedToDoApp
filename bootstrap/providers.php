<?php


use App\Presentation\Tasks\ServiceProviders\TasksServiceProvider;
use App\Presentation\Users\ServiceProviders\UserAppServiceProvider;
use App\Presentation\TaskCollections\ServiceProviders\TaskCollectionServiceProvider;
use App\Presentation\UserTaskCollections\ServiceProviders\UserTaskCollectionServiceProvider;

return [
    UserAppServiceProvider::class,
    TasksServiceProvider::class,
    TaskCollectionServiceProvider::class,
    UserTaskCollectionServiceProvider::class
];
