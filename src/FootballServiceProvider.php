<?php

namespace FootballData;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class FootballServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('football', function () {
            $client = new Client([
                'base_uri' => 'http://api.football-data.org/v2/',
                'headers' => [
                    'X-Auth-Token' => getenv('FOOTBALLDATA_API_KEY'),
                    'X-Response-Control' => 'full',
                ]
            ]);
            return new Football($client);
        });
    }
}
