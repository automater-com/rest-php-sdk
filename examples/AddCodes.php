<?php
include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

// ID of database to which you'd like to add codes
$databaseId = 1234;

$addCodesRequest = new \AutomaterSDK\Request\AddCodesRequest();
$addCodesRequest->setCodes([
    "code_1",
    "code_2",
    "code_3"
]);

try {
    $addCodesResponse = $client->addCodes($databaseId, $addCodesRequest);
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

echo 'Codes added to database with ID: ' . $addCodesResponse->getDatabaseId() . '<br>';
echo 'Added count: ' . $addCodesResponse->getAddedCount() . '<br>';