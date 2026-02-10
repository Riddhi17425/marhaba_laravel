<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrap();
        
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => env('RECAPTCHA_SECRET_KEY'),
                    'response' => $value,
                    'remoteip' => $_SERVER['REMOTE_ADDR'],
                ],
            ]);

            $body = json_decode((string) $response->getBody());
            return $body->success;
        });

        View::composer('layouts.frontheader', function ($view) {
            $menuTypes = config('global_values.product_type');
            $view->with(['menuTypes' => $menuTypes]);
        });
    }
}
