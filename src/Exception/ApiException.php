<?php
namespace AutomaterSDK\Exception;

class ApiException extends \Exception
{
    public function __construct($code, $message)
    {
        parent::__construct("Automater exception (" . $code . "): " . $message, 500, null);
    }

}