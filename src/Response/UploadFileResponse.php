<?php
namespace AutomaterSDK\Response;

class UploadFileResponse extends BaseResponse
{
    /** @var int */
    protected $databaseId;

    /** @var string */
    protected $filename;

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
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

}