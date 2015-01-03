<?php
namespace Saphira\Core\CommandBus;

interface CommandBusInterface {

    public function execute(CommandInterface $command);
}