<?php
namespace AutomaterSDK\Response;

use AutomaterSDK\Entity\BaseEntity;
use Doctrine\Common\Collections\Collection;

abstract class BaseCollection
{
    protected $currentPage;
    protected $recordsCount;
    protected $currentCount;
    protected $pagesCount;

    /** @var Collection */
    protected $data = [];

    /**
     * @return Collection
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param Collection $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param BaseEntity $data
     */
    public function addDataElement($data)
    {
        $this->data[] = $data;
    }

    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param mixed $currentPage
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    /**
     * @return mixed
     */
    public function getRecordsCount()
    {
        return $this->recordsCount;
    }

    /**
     * @param mixed $recordsCount
     */
    public function setRecordsCount($recordsCount)
    {
        $this->recordsCount = $recordsCount;
    }

    /**
     * @return mixed
     */
    public function getCurrentCount()
    {
        return $this->currentCount;
    }

    /**
     * @param mixed $currentCount
     */
    public function setCurrentCount($currentCount)
    {
        $this->currentCount = $currentCount;
    }

    /**
     * @return mixed
     */
    public function getPagesCount()
    {
        return $this->pagesCount;
    }

    /**
     * @param mixed $pagesCount
     */
    public function setPagesCount($pagesCount)
    {
        $this->pagesCount = $pagesCount;
    }

    public static function create($data)
    {
        $object = new static();

        $object->currentCount = $data['_currentCount'];
        $object->currentPage = $data['_currentPage'];
        $object->pagesCount = $data['_pagesCount'];
        $object->recordsCount = $data['_recordsCount'];

        return $object;
    }
}