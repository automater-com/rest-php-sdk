<?php
namespace AutomaterSDK\Request;

class AddCodesRequest extends BaseRequest
{
    protected $codes;

    /**
     * @return array
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * @param array $codes
     */
    public function setCodes($codes)
    {
        $this->codes = $codes;
    }


}