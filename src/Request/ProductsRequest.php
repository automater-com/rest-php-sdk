<?php
namespace AutomaterSDK\Request;

class ProductsRequest extends BaseCollectionRequest
{
    const TYPE_ALLEGRO = 1;
    const TYPE_SHOP = 2;
    const TYPE_EBAY = 3;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    protected $type;
    protected $status;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}