<?php
include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

$transactionRequest = new \AutomaterSDK\Request\TransactionRequest();
$transactionRequest->setEmail('example@domain.com');
$transactionRequest->setLanguage(\AutomaterSDK\Request\TransactionRequest::LANGUAGE_PL);
$transactionRequest->setPhone('123123123');
$transactionRequest->setSendStatusEmail(\AutomaterSDK\Request\TransactionRequest::SEND_STATUS_EMAIL_TRUE);
$transactionRequest->setCustom('TRANSACTION FROM API');

// In case you'd like to redirect user to payment page
// you should set connectorId:
// $transactionRequest->setConnectorId(1234);
// In response you will receive paymentUrl (eg. PayPal payment page)

$transactionProduct = new \AutomaterSDK\Request\Entity\TransactionProduct();
$transactionProduct->setId(1234); // product ID
$transactionProduct->setQuantity(3); // quantity of product

// Optionally: set product price and currency
// If not passed those values will be taken from product settings
$transactionProduct->setPrice(10.00);
$transactionProduct->setCurrency('USD');

$transactionRequest->setProducts([
    $transactionProduct
]);

try {
    $transactionResponse = $client->createTransaction($transactionRequest);
} catch (\AutomaterSDK\Exception\UnauthorizedException $exception) {
    die('Invalid API key or API secret');
} catch (\AutomaterSDK\Exception\TooManyRequestsException $exception) {
    die('Too many requests to Automater: ' . $exception->getMessage());
} catch (\AutomaterSDK\Exception\NotFoundException $exception) {
    die('Not found - invalid params');
} catch (\AutomaterSDK\Exception\ApiException $exception) {
    die($exception->getMessage());
}

echo 'Cart ID: ' . $transactionResponse->getCartId() . '<br>';
echo 'Payment URL: ' . $transactionResponse->getPaymentUrl() . '<br>';
echo 'Created at: ' . $transactionResponse->getCreatedAt() . '<br>';
echo 'Currency: ' . $transactionResponse->getOrderCurrency() . '<br>';
echo 'Amount: ' . $transactionResponse->getOrderAmount() . '<br>';