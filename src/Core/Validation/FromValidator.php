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

    public function validate(CommandInterface $command)
    {
        $formData = get_object_vars($command);

        $this->validation = $this->validator->make(
            $formData,
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        if($this->validator->fails())
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