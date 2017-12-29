<?php
namespace AutomaterSDK\Lib;

class SignatureCalculator
{
    public static function calculate($data, $signature)
    {
        $sorted = self::rksort($data);

        return hash('sha256', urldecode(http_build_query($sorted)) . $signature, false);
    }

    public static function rksort($data)
    {
        ksort($data);

        foreach ($data as &$item) {
            if (is_array($item)) {
                $item = self::rksort($item);
            }
        }

        return $data;
    }
}