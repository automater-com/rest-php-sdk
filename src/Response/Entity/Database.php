<?php
namespace AutomaterSDK\Response\Entity;

class Database extends BaseEntity
{
    const TYPE_STANDARD = 1;
    const TYPE_RECURSIVE = 2;

    protected $id;
    protected $type;
    protected $name;
    protected $codesAvailable;
    protected $codesSent;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

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
     * @return int
     */
    public function getCodesAvailable()
    {
        return $this->codesAvailable;
    }

    /**
     * @param int $codesAvailable
     */
    public function setCodesAvailable($codesAvailable)
    {
        $this->codesAvailable = $codesAvailable;
    }

    /**
     * @return int
     */
    public function getCodesSent()
    {
        return $this->codesSent;
    }

    /**
     * @param int $codesSent
     */
    public function setCodesSent($codesSent)
    {
        $this->codesSent = $codesSent;
    }


}