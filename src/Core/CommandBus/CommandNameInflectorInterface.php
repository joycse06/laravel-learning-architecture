<?php namespace Saphira\Core\CommandBus;


interface CommandNameInflectorInterface {

    public function getHandler(CommandInterface $command );

    public function getValidator(CommandInterface $command);
}