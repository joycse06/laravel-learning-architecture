<?php namespace Saphira\Core\CommandBus;


use Illuminate\Support\ServiceProvider;

class CommandBusServiceProvider extends ServiceProvider{

    protected $defer = false;

    public function register()
    {
        $this->registerCommandNameInflector();

        $this->registerCommandBus();
    }

    public function provides()
    {
        return [''];
    }

    protected function registerCommandNameInflector()
    {
        $this->app->bind(
            'Saphira\Core\CommandBus\CommandNameInflectorInterface',
            'Saphira\Core\CommandBus\BasicCommandNameInflector'
        );
    }

    protected function registerCommandBus()
    {
        $this->app->bind('Saphira\Core\CommandBus\CommandBusInterface', function ($app)
        {
            $default = $app->make('Saphira\Core\CommandBus\DefaultCommandBus');
            $translator = $app->make('Saphira\Core\CommandBus\CommandNameInflectorInterface');

            return new ValidationCommandBus($default, $app, $translator);
        });
//        $this->app->bind(
//            'Saphira\Core\CommandBus\CommandBusInterface',
//            'Saphira\Core\CommandBus\ValidationCommandBus'
//        );
    }
}