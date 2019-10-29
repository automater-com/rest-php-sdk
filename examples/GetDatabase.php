<?php
include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

try {
    $databaseResponse = $client->getDatabase(1234); // database id
} catch (\AutomaterSDK\Exception\UnauthorizedException $exception) {
    die('Invalid API key');
} catch (\AutomaterSDK\Exception\TooManyRequestsException $exception) {
    die('Too many requests to Automater: ' . $exception->getMessage());
} catch (\AutomaterSDK\Exception\NotFoundException $exception) {
    die('Not found - invalid params');
} catch (\AutomaterSDK\Exception\ApiException $exception) {
    die($exception->getMessage());
}

$database = $databaseResponse->getDatabase();
echo 'ID: ' . $database->getId() . '<br>';
echo 'Name: ' . $database->getName() . '<br>';
echo 'Type: ' . $database->getType() . '<br>';
echo 'Codes available: ' . $database->getCodesAvailable() . '<br>';
echo 'Codes sent: ' . $database->getCodesSent() . '<br>';