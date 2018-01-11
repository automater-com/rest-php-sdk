<?php
include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

try {
    $product = $client->getProductDetails(1234); // your product ID
} catch (\AutomaterSDK\Exception\UnauthorizedException $exception) {
    die('Invalid API key');
} catch (\AutomaterSDK\Exception\TooManyRequestsException $exception) {
    die('Too many requests to Automater: ' . $exception->getMessage());
} catch (\AutomaterSDK\Exception\NotFoundException $exception) {
    die('Not found - invalid params');
} catch (\AutomaterSDK\Exception\ApiException $exception) {
    die($exception->getMessage());
}

echo 'Product ID: ' . $product->getId() . '<br>';
echo 'Status: ' . $product->getStatus() . '<br>';
echo 'Price: ' . $product->getPrice() . '<br>';
echo 'Currency: ' . $product->getCurrency() . '<br>';
echo 'Name: ' . $product->getName() . '<br>';
echo 'Description: ' . $product->getDescription() . '<br>';
echo 'Type: ' . $product->getType() . '<br>';
echo 'Database ID: ' . $product->getDatabaseId() . '<br>';
echo 'Available codes: ' . $product->getAvailableCodes() . '<br>';