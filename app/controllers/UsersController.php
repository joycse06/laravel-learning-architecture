<?php

use Saphira\Core\CommandBus\CommandTrait;
use Saphira\Users\Commands\RegisterUserCommand;
use Saphira\Users\UserRepository;


class UsersController extends BaseController{

    Use CommandTrait;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }
    public function store(){

        $this->execute(RegisterUserCommand::class);
    }

    public function show()
    {
        $user = $this->userRepository->findById(1);

        return View::make('users.show')->withUser($user);
    }
}