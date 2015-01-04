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
    /**
     * @var
     */
    public $username;

    public $confirmation_code;
    /**
     * @var
     */
    public $password_confirmation;

    public function __construct($username, $email, $password, $password_confirmation){

        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->confirmation_code = bin2hex(openssl_random_pseudo_bytes(16));
        $this->password_confirmation = $password_confirmation;
    }

}