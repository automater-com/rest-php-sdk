<?php
namespace AutomaterSDK\Exception;

class TooManyRequestsException extends \Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message, 500, null);
    }

}