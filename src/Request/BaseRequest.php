<?php
namespace AutomaterSDK\Request;

use AutomaterSDK\Lib\Camelizer;
use AutomaterSDK\Lib\SignatureCalculator;

abstract class BaseRequest
{
    public function getSignature($signature)
    {
        $vars = $this->toArray();

        return SignatureCalculator::calculate($vars, $signature);
    }

    public function toArray()
    {
        $vars = get_object_vars($this);

        $result = [];
        foreach ($vars as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $childKey => $childValue) {
                    if ($childValue instanceof BaseRequest) {
                        $result[Camelizer::decamelize($key)][$childKey] = $childValue->toArray();
                        continue;
                    }

                    $result[Camelizer::decamelize($key)][$childKey] = $value;
                }

                continue;
            }

            if ($value instanceof BaseRequest) {
                $result[Camelizer::decamelize($key)] = $value->toArray();
                continue;
            }

            $result[Camelizer::decamelize($key)] = $value;
        }

        return $result;
    }

    public function toQueryString()
    {
        return http_build_query($this->toArray());
    }
}