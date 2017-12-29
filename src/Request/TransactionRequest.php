<?php
namespace AutomaterSDK\Request;

use AutomaterSDK\Request\Entity\TransactionProduct;

class TransactionRequest extends BaseRequest
{
    const SEND_STATUS_EMAIL_TRUE = "y";
    const SEND_STATUS_EMAIL_FALSE = "n";

    const LANGUAGE_PL = "pl";
    const LANGUAGE_EN = "en";

    protected $email;
    protected $phone;
    protected $language;
    protected $products;

    protected $custom = null;
    protected $connectorId = null;
    protected $sendStatusEmail = self::SEND_STATUS_EMAIL_TRUE;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getConnectorId()
    {
        return $this->connectorId;
    }

    /**
     * @param mixed $connectorId
     */
    public function setConnectorId($connectorId)
    {
        $this->connectorId = $connectorId;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return TransactionProduct[]|null
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param TransactionProduct[] $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return mixed
     */
    public function getSendStatusEmail()
    {
        return $this->sendStatusEmail;
    }

    /**
     * @param mixed $sendStatusEmail
     */
    public function setSendStatusEmail($sendStatusEmail)
    {
        $this->sendStatusEmail = $sendStatusEmail;
    }

    /**
     * @return null
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * @param null $custom
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;
    }
}