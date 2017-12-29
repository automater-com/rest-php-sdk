<?php
namespace AutomaterSDK\Response\Entity;

use AutomaterSDK\Lib\Camelizer;

abstract class BaseEntity
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