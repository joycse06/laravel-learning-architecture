<?php namespace Saphira\Users\Validators;


use Saphira\Core\Validation\FormValidator;

class RegisterUserValidator extends FormValidator{

    protected $rules = [
        'username' => 'required|unique:users',
        'email'    => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];

}