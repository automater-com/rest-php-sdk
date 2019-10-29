<?php
namespace AutomaterSDK\Response;

use AutomaterSDK\Response\Entity\Database;
use Doctrine\Common\Collections\ArrayCollection;

class DatabaseResponse extends BaseResponse
{
    /** @var Database|null */
    protected $database;

    public static function create($data)
    {
        $object = new static();
        $object->setDatabase(Database::create($data['database']));

        return $object;
    }

    /**
     * @return Database|null
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param Database $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }
}