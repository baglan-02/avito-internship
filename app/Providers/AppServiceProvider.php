<?php

namespace App\Providers;

use App\Http\Resources\BookingResource;
use App\Http\Resources\RoomResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        RoomResource::withoutWrapping();
        BookingResource::withoutWrapping();
    }
}
