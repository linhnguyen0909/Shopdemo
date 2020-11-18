<?php

namespace App\Providers;

use GuzzleHttp\Client;
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
//        $this->app->singleton(\Goutte\Client::class,function ($app){
//            $client= new \Goutte\Client();
//            $client->setClient(new \GuzzleHttp\Client([
//                'timeout'=> 20,
//                'allow_redirects'=>false,
//            ]));
//            return $client;
//        });
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
