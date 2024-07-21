<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\TodolistService;
use App\Services\Impl\TodolistServiceImpl;

class TodolistServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons= [
        TodolistService::class => TodolistServiceImpl::class
    ];

    public function provides() {
        return [TodolistService::class];
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
