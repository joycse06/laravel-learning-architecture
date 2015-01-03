<?php namespace Saphira\Users\Handlers;


use Saphira\Core\CommandBus\CommandInterface;
use Saphira\Core\CommandBus\CommandHandlerInterface;

class RegisterUserHandler implements CommandHandlerInterface{


    public function handle(CommandInterface $command)
    {
        dump($command);
        dump("Handling RegisteruserCommand");
    }
}