<?php
namespace AutomaterSDK\Response;

use AutomaterSDK\Response\Entity\Product;
use Doctrine\Common\Collections\ArrayCollection;

class ProductsResponse extends BaseCollection
{
    public static function create($data)
    {
        $object = parent::create($data);

        $products = [];
        if (!empty($data['products'])) {
            foreach ($data['products'] as $element) {
                $products[] = Product::create($element);
            }
        }

        $object->setData(new ArrayCollection($products));

        return $object;
    }
}