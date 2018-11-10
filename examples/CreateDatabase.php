<?php
include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

$createDatabaseRequest = new \AutomaterSDK\Request\CreateDatabaseRequest();
$createDatabaseRequest->setName("test database");
$createDatabaseRequest->setType(\AutomaterSDK\Request\CreateDatabaseRequest::TYPE_STANDARD);

try {
    $createDatabaseResponse = $client->createDatabase($createDatabaseRequest);
} catch (\AutomaterSDK\Exception\UnauthorizedException $exception) {
    die('Invalid API key or API secret');
} catch (\AutomaterSDK\Exception\TooManyRequestsException $exception) {
    die('Too many requests to Automater: ' . $exception->getMessage());
} catch (\AutomaterSDK\Exception\NotFoundException $exception) {
    die('Not found - invalid params');
} catch (\AutomaterSDK\Exception\ApiException $exception) {
    var_dump($exception->getValidationErrors());
    die($exception->getMessage());
}

echo 'Created database ID: ' . $createDatabaseResponse->getId();