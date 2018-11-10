<?php
namespace AutomaterSDK\Exception;

class ApiException extends \Exception
{
    protected $validationErrors = [];

    public function __construct($code, $message, $validationErrors = [])
    {
        $this->setValidationErrors($validationErrors);
        $message = sprintf("Automater exception (%s): %s", $code, $message);
        parent::__construct($message, 500, null);
    }

    /**
     * @return array
     */
    public function getValidationErrors()
    {
        return $this->validationErrors;
    }

    /**
     * @param array $validation
     */
    public function setValidationErrors($validation)
    {
        $this->validationErrors = $validation;
    }

}