<?php namespace Saphira\Users\Validators;


use Saphira\Core\Validation\FormValidator;

class SignInValidator extends FormValidator {

    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];
}