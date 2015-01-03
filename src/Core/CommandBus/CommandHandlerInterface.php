<?php namespace Saphira\Core\CommandBus;


interface CommandHandlerInterface {

    public function handle(CommandInterface $command);
}