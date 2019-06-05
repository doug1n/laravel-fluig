<?php

namespace doug1n\Fluig;


use Illuminate\Support\ServiceProvider;

class FluigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/fluig.php' => config_path('fluig.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/fluig.php', 'fluig'
        );
    }
}