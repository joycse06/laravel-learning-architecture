<?php namespace Saphira\Core\CommandBus;

use Illuminate\Foundation\Application;
use InvalidArgumentException;

class DefaultCommandBus implements CommandBusInterface {

    /**
     * @var Application
     */
    protected $app;

    /**
     * @var CommandNameInflector
     */
    protected $commandNameInflector;

    /**
     * List of optional decorators for command bus.
     *
     * @var array
     */
    protected $decorators = [];

    /**
     * @param Application $app
     * @param CommandNameInflectorInterface $commandNameInflector
     */
    function __construct(Application $app, CommandNameInflectorInterface $commandNameInflector)
    {
        $this->app = $app;
        $this->commandNameInflector = $commandNameInflector;
    }

    /**
     * Decorate the command bus with any executable actions.
     *
     * @param  string $className
     * @return mixed
     */
    public function decorate($className)
    {
        $this->decorators[] = $className;
    }

    /**
     * Execute the command
     *
     * @param $command
     * @return mixed
     */
    public function execute(CommandInterface $command)
    {
        $this->executeDecorators($command);

        $handler = $this->commandNameInflector->getHandler($command);

        return $this->app->make($handler)->handle($command);
    }

    /**
     * Execute all registered decorators
     *
     * @param  CommandInterface $command
     * @throws InvalidArgumentException
     * @return null
     */
    protected function executeDecorators(CommandInterface $command)
    {
        foreach ($this->decorators as $className)
        {
            $instance = $this->app->make($className);

            if ( ! $instance instanceof CommandBusInterface)
            {
                $message = 'The class to decorate must be an implementation of Saphira\Core\CommandBus\CommandBusInterface';

                throw new InvalidArgumentException($message);
            }

            $instance->execute($command);
        }
    }

}