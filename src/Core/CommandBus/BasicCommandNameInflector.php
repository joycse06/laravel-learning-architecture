<?php namespace Saphira\Core\CommandBus;


use Saphira\Core\CommandBus\Exceptions\HandlerNotFoundException;

/**
 * Class BasicCommandNameInflector
 * @package Saphira\Core\CommandBus
 */
class BasicCommandNameInflector implements CommandNameInflectorInterface{


    /**
     * Convert a command name to it's Handler Counterpart
     *
     * @param CommandInterface $command
     * @return mixed
     * @throws Exceptions\HandlerNotFoundException
     */
    public function getHandler(CommandInterface $command)
    {
        $commandClass = get_class($command);

        $segments = explode('\\', $commandClass);

        array_splice($segments, -2, 1, 'Handlers');

        $handlerClass = str_replace('Command', 'Handler', implode('\\', $segments));

        if( ! class_exists($handlerClass))
        {
            $message = "Command Handler [$handlerClass] does not exist";

            throw new HandlerNotFoundException($message);
        }

        return $handlerClass;
    }

    /**
     * Convert a Command to it's validator counterpart
     *
     * @param CommandInterface $command
     * @return String
     */
    public function getValidator(CommandInterface $command)
    {
        $segments = explode('\\', get_class($command));

        array_splice($segments, -2, 1, 'Validators');

        return str_replace('Command', 'Validator', implode('\\', $segments));

    }
}