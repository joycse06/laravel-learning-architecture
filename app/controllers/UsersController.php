<?php

use Saphira\Core\CommandBus\CommandTrait;
use Saphira\Users\Commands\RegisterUserCommand;

class UsersController extends BaseController{

    Use CommandTrait;

    public function store(){

        $this->execute(RegisterUserCommand::class);
    }
}