<?php

namespace Legodion\Convoy\Providers;

use Illuminate\Support\ServiceProvider;
use Legodion\Convoy\Commands\ComponentCommand;

class ConvoyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ComponentCommand::class,
            ]);
        }
        
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }
}
