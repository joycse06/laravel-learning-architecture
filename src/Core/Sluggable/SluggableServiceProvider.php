<?php namespace Saphira\Core\Sluggable;

use Illuminate\Support\ServiceProvider;
use Log;

class SluggableServiceProvider extends ServiceProvider {


    protected $defer = false;
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen('eloquent.saving*', function($model){
           if($model instanceof SluggableInterface)
           {
               Log::info('Slugging');
               $model->sluggify();
           }
        });
    }
}