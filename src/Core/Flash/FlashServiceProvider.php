<?php namespace Saphira\Core\Flash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider{

    protected $defer = false;

    public function register()
    {
        $this->app->bindShared('flash', function(){
            return $this->app->make('Saphira\Core\Flash\FlashMessage');
        });
    }

    public function provides()
    {
        return ['flash'];
    }

}