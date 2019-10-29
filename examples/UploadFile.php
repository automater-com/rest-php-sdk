<?php

use AutomaterSDK\Request\UploadFileRequest;

include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

$uploadFileRequest = new UploadFileRequest();
$uploadFileRequest->setFilename('testfile-' . (new DateTime())->format('dmY-His') . '.jpg');
$uploadFileRequest->setData(base64_encode(file_get_contents('testfile.jpg')));

try {
    $uploadFileResponse = $client->uploadFile(1234, $uploadFileRequest); // database id as first param
} catch (\AutomaterSDK\Exception\UnauthorizedException $exception) {
    die('Invalid API key');
} catch (\AutomaterSDK\Exception\TooManyRequestsException $exception) {
    die('Too many requests to Automater: ' . $exception->getMessage());
} catch (\AutomaterSDK\Exception\NotFoundException $exception) {
    die('Not found - invalid params');
} catch (\AutomaterSDK\Exception\ApiException $exception) {
    var_dump($exception->getValidationErrors());
    die($exception->getMessage());
}

echo 'ID of database: ' . $uploadFileResponse->getDatabaseId() . '<br>';
echo 'Uploaded filename: ' . $uploadFileResponse->getFilename() . '<br>';