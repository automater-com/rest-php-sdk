<?php
namespace AutomaterSDK\Response;

use AutomaterSDK\Lib\Camelizer;

abstract class BaseResponse
{
    public static function create($data)
    {
        $object = new static();
        $object->convert($data);

        return $object;
    }

    public function convert($data)
    {
        foreach ($data as $key => $value) {
            $camelized = Camelizer::camelize($key);
            $this->$camelized = $value;
        }
    }
}