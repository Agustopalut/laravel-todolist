<?php

namespace App\Providers;

use App\Services\UserService;
use App\Services\Impl\UserServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider 
{
    public array $singletons =[

        UserService::class => UserServiceImpl::class,
            
    ];
    public function provides(): array
    {
        return [UserService::class];
        // tujuan dari provides agar dipanggil ketika dibutuhkan saja 
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
