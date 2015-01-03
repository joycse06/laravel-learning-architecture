<?php  namespace Saphira\Core\CommandBus;

use Illuminate\Foundation\Application;
use InvalidArgumentException;

class ValidationCommandBus implements CommandBusInterface {

    /**
     * @var CommandBus
     */
    protected $bus;

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

    function __construct(CommandBusInterface $bus, Application $app, CommandNameInflectorInterface $commandNameInflector)
    {
        $this->bus = $bus;
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
     * Execute a command with validation.
     *
     * @param $command
     * @return mixed
     */
    public function execute(CommandInterface $command)
    {
        // If a validator is "registered," we will
        // first trigger it, before moving forward.
        $this->validateCommand($command);

        // Next, we'll execute any registered decorators.
        $this->executeDecorators($command);

        // And finally pass through to the handler class.
        return $this->bus->execute($command);
    }

    /**
     * If appropriate, validate command data.
     *
     * @param $command
     */
    protected function validateCommand($command)
    {
        $validator = $this->commandNameInflector->getValidator($command);

        if (class_exists($validator))
        {
            $this->app->make($validator)->validate($command);
        }
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
                $message = 'The class to decorate must be an implementation of Saphira\Core\Commandbus\CommandBusInterface';

                throw new InvalidArgumentException($message);
            }

            $instance->execute($command);
        }
    }

}
