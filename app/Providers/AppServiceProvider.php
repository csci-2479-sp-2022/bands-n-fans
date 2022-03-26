<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BandService;
use App\Contracts\BandInterface;
use App\Services\AccountService;
use App\Contracts\UserInterface;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        BandInterface::class => BandService::class,
        UserInterface::class => AccountService::class,
    ];


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
