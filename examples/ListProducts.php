<?php
include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

$productRequest = new \AutomaterSDK\Request\ProductsRequest();
$productRequest->setType(\AutomaterSDK\Request\ProductsRequest::TYPE_SHOP);
$productRequest->setStatus(\AutomaterSDK\Request\ProductsRequest::STATUS_ACTIVE);
$productRequest->setPage(1);
$productRequest->setLimit(10);

try {
    $productsResponse = $client->getProducts($productRequest);
} catch (\AutomaterSDK\Exception\UnauthorizedException $exception) {
    die('Invalid API key');
} catch (\AutomaterSDK\Exception\TooManyRequestsException $exception) {
    die('Too many requests to Automater: ' . $exception->getMessage());
} catch (\AutomaterSDK\Exception\NotFoundException $exception) {
    die('Not found - invalid params');
} catch (\AutomaterSDK\Exception\ApiException $exception) {
    die($exception->getMessage());
}

echo 'Pages count: ' . $productsResponse->getPagesCount() . '<br>';
echo 'Records count: ' . $productsResponse->getRecordsCount() . '<br>';
echo 'Current page: ' . $productsResponse->getCurrentPage() . '<br>';
echo 'Current records count: ' . $productsResponse->getCurrentCount() . '<br>';
echo '<br>';

foreach ($productsResponse->getData() as $product) {
    /** @var \AutomaterSDK\Response\Entity\Product $product */
    echo 'Product ID: ' . $product->getId() . '<br>';
    echo 'Status: ' . $product->getStatus() . '<br>';
    echo 'Price: ' . $product->getPrice() . '<br>';
    echo 'Currency: ' . $product->getCurrency() . '<br>';
    echo 'Name: ' . $product->getName() . '<br>';
    echo 'Description: ' . $product->getDescription() . '<br>';
    echo 'Type: ' . $product->getType() . '<br>';
    echo 'Database ID: ' . $product->getDatabaseId() . '<br>';
    echo 'Available codes: ' . $product->getAvailableCodes() . '<br>';
    echo '<br>';
}