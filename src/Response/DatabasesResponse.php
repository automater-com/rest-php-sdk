<?php
namespace AutomaterSDK\Response;

use AutomaterSDK\Response\Entity\Database;
use Doctrine\Common\Collections\ArrayCollection;

class DatabasesResponse extends BaseCollection
{
    public static function create($data)
    {
        $object = parent::create($data);

        $products = [];
        if (!empty($data['databases'])) {
            foreach ($data['databases'] as $element) {
                $products[] = Database::create($element);
            }
        }

        $object->setData(new ArrayCollection($products));

        return $object;
    }
}