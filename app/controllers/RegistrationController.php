<?php

use Saphira\Users\Commands\RegisterUserCommand;

class RegistrationController extends BaseController {

    function __construct()
    {
        $this->beforeFilter('guest');
    }

    public function create()
    {
        return View::make('registration.create');
    }

    public function store()
    {
        $user = $this->execute(RegisterUserCommand::class);
        Auth::login($user);

        Flash::success('Your registration has been successful. You can login now.');

        return Redirect::home();
    }
}