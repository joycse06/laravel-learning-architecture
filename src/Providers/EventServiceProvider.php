<?php namespace Saphira\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app['events']->listen('Saphira.*', 'Saphira\Handlers\EmailNotifier');
    }
}