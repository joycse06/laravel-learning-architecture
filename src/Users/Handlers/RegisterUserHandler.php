<?php namespace Saphira\Users\Handlers;


use Saphira\Core\CommandBus\CommandInterface;
use Saphira\Core\CommandBus\CommandHandlerInterface;
use Saphira\Core\Events\DispatchableTrait;
use Saphira\Users\User;
use Saphira\Users\UserRepository;

class RegisterUserHandler implements CommandHandlerInterface{

    use DispatchableTrait;

    protected $repository;

    public function __construct(UserRepository $repository)
    {

        $this->repository = $repository;
    }

    public function handle(CommandInterface $command)
    {
        // This is a temporary check
        if(\Config::get('saphira.confirmation_email'))
            $confirmed = 0;
        else{
            // local installation, confirmation Not required
            $confirmed = 1;
        }

        $user = User::register(
            $command->username, $command->email, $command->password,
            $command->confirmation_code, $confirmed
        );

        $this->repository->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }
}