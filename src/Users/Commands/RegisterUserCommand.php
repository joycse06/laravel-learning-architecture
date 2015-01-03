<?php namespace Saphira\Users\Commands;


use Saphira\Core\CommandBus\CommandInterface;

class RegisterUserCommand implements CommandInterface{

    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $password;

    public function __construct($email, $password){

        $this->email = $email;
        $this->password = $password;
    }

}