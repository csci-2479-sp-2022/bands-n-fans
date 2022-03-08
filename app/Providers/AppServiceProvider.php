<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BandService;
use App\Contracts\BandInterface;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        BandInterface::class => BandService::class,
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
