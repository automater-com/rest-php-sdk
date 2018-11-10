<?php
include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

$databasesRequest = new \AutomaterSDK\Request\DatabasesRequest();
$databasesRequest->setLimit(10);

// optionally you can pass type to request
// $databasesRequest->setType(\AutomaterSDK\Request\DatabasesRequest::TYPE_STANDARD);

try {
    $databasesResponse = $client->getDatabases($databasesRequest);
} catch (\AutomaterSDK\Exception\UnauthorizedException $exception) {
    die('Invalid API key');
} catch (\AutomaterSDK\Exception\TooManyRequestsException $exception) {
    die('Too many requests to Automater: ' . $exception->getMessage());
} catch (\AutomaterSDK\Exception\NotFoundException $exception) {
    die('Not found - invalid params');
} catch (\AutomaterSDK\Exception\ApiException $exception) {
    die($exception->getMessage());
}

echo 'Pages count: ' . $databasesResponse->getPagesCount() . '<br>';
echo 'Records count: ' . $databasesResponse->getRecordsCount() . '<br>';
echo 'Current page: ' . $databasesResponse->getCurrentPage() . '<br>';
echo 'Current records count: ' . $databasesResponse->getCurrentCount() . '<br>';
echo '<br>';

foreach ($databasesResponse->getData() as $database) {
    /** @var \AutomaterSDK\Response\Entity\Database $database */
    echo 'ID: ' . $database->getId() . '<br>';
    echo 'Name: ' . $database->getName() . '<br>';
    echo 'Type: ' . $database->getType() . '<br>';
    echo 'Codes available: ' . $database->getCodesAvailable() . '<br>';
    echo 'Codes sent: ' . $database->getCodesSent() . '<br>';
    echo '<br>';
}