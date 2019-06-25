<?php
include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

// ID of transactions to which you'd like to add note
$transactionId = 1234;

$addNoteToTransaction = new \AutomaterSDK\Request\AddNoteToTransactionRequest();
$addNoteToTransaction->setNote('Test note : ' . date("Y-m-d H:i:s"));

try {
    $addNoteToTransactionResponse = $client->addNoteToTransaction($transactionId, $addNoteToTransaction);
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

echo 'success';