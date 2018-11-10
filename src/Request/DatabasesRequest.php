<?php
namespace AutomaterSDK\Request;

class DatabasesRequest extends BaseCollectionRequest
{
    const TYPE_STANDARD = 1;
    const TYPE_RECURSIVE = 2;

    protected $type;

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}