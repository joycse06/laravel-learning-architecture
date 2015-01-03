<?php namespace Saphira\Core\Validation;


class FormValidationException extends \Exception {

    protected $errors;

    function __construct($message, $errors)
    {
        $this->errors = $errors;

        parent::__construct($message);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}