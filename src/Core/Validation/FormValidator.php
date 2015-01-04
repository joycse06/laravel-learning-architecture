<?php namespace Saphira\Core\Validation;

use Illuminate\Validation\Factory as Validator;
use Saphira\Core\CommandBus\CommandInterface;


abstract class FormValidator {

    protected $validator;


    protected $validation;

    protected $messages = [];

    function __construct(Validator $validator)
    {

        $this->validator = $validator;
    }

    public function validate( $formData )
    {
        if(is_object($formData)) {
            // if a command is passed then extract
            // the public properties from it
            $formData = get_object_vars($formData);
        }



        $this->validation = $this->validator->make(
            $formData,
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        if($this->validation->fails())
        {
            throw new FormValidationException('Validation Failed', $this->getValidationErrors());
        }
    }

    public function getValidationRules()
    {
        return $this->rules;
    }

    public function getValidationMessages()
    {
        return $this->messages;
    }

    public function getValidationErrors()
    {
        return $this->validation->errors();
    }
}