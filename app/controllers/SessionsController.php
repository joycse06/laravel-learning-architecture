<?php

use Saphira\Users\Validators\SignInValidator;

class SessionsController extends \BaseController {

    private $signInForm;

    public function __construct(SignInValidator $signInForm)
    {
        $this->signInForm = $signInForm;

        $this->beforeFilter('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return View::make('sessions.create');
    }

    public function store()
    {
        $formData = Input::only('email', 'password');

        $this->signInForm->validate($formData);

        if( ! Auth::attempt($formData, (Input::has('remember_me'))? true : false))
        {
            Flash::message('We were unable to sign you in. Please check your credentials and try again!');

            return Redirect::back()->withInput();
        }

        Flash::message('Welcome Back!');

        return Redirect::intended('/');
    }

    public function destroy()
    {
        Auth::logout();

        Flash::message('You have been logged out.');

        return Redirect::home();
    }


}