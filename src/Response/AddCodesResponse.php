<?php
namespace AutomaterSDK\Response;

class AddCodesResponse extends BaseResponse
{
    protected $databaseId;
    protected $addedCount;

    /**
     * @return int
     */
    public function getDatabaseId()
    {
        return $this->databaseId;
    }

    /**
     * @param int $databaseId
     */
    public function setDatabaseId($databaseId)
    {
        $this->databaseId = $databaseId;
    }

    /**
     * @return int
     */
    public function getAddedCount()
    {
        return $this->addedCount;
    }

    /**
     * @param int $addedCount
     */
    public function setAddedCount($addedCount)
    {
        $this->addedCount = $addedCount;
    }



}