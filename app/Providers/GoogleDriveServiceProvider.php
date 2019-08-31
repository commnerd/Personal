<?php

namespace App\Providers;

use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Google_Client::class, function ($app) {
            $client = new Google_Client();
            Storage::disk('local')->put('client_secret.json', json_encode([
                'web' => config('services.google')
            ]));
            $client->setAuthConfig(Storage::path('client_secret.json'));
            return $client;
        });
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
