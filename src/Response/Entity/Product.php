<?php
namespace AutomaterSDK\Response\Entity;

class Product extends BaseEntity
{
    const TYPE_ALLEGRO = 1;
    const TYPE_SHOP = 2;
    const TYPE_EBAY = 3;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $id;
    protected $type;
    protected $name;
    protected $url;
    protected $description;
    protected $price;
    protected $currency;
    protected $availableCodes;
    protected $databaseId;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getAvailableCodes()
    {
        return $this->availableCodes;
    }

    /**
     * @param mixed $availableCodes
     */
    public function setAvailableCodes($availableCodes)
    {
        $this->availableCodes = $availableCodes;
    }

    /**
     * @return mixed
     */
    public function getDatabaseId()
    {
        return $this->databaseId;
    }

    /**
     * @param mixed $databaseId
     */
    public function setDatabaseId($databaseId)
    {
        $this->databaseId = $databaseId;
    }

}