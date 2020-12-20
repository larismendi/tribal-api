<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
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
        Response::macro('success', function ($value) {
            return Response::make([
                'success' => true,
                'result' => $value['result']
            ])->original;
        });

        Response::macro('error', function ($value, $status = 400) {
            return Response::make([
                'success' => false,
                'errors' => $value['errors']
            ], $status);
        });
    }
}
