<?php namespace Saphira\Posts\Validators;


use Saphira\Core\Validation\FormValidator;

class PublishPostValidator extends FormValidator {

    protected $rules = [
        'title' => 'required'
    ];
}