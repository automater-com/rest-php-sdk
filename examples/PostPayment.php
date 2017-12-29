<?php
include_once '../vendor/autoload.php';

$client = new \AutomaterSDK\Client\Client('YOUR_API_KEY', 'YOUR_API_SECRET');

$paymentRequest = new \AutomaterSDK\Request\PaymentRequest();
$paymentRequest->setPaymentId('TEST-PAYMENT');
$paymentRequest->setCurrency('EUR');
$paymentRequest->setAmount(100);
$paymentRequest->setDescription('TEST API SDK');
$paymentRequest->setCustom('PAYMENT FROM API');

$cartId = 1234;

try {
    $paymentResponse = $client->postPayment($cartId, $paymentRequest);
} catch (\AutomaterSDK\Exception\UnauthorizedException $exception) {
    die('Invalid API key or API secret');
} catch (\AutomaterSDK\Exception\TooManyRequestsException $exception) {
    die('Too many requests to Automater: ' . $exception->getMessage());
} catch (\AutomaterSDK\Exception\NotFoundException $exception) {
    die('Not found - invalid params');
} catch (\AutomaterSDK\Exception\ApiException $exception) {
    die($exception->getMessage());
}

echo 'Cart ID: ' . $paymentResponse->getCartId() . '<br>';
echo 'Currency: ' . $paymentResponse->getCurrency() . '<br>';
echo 'Amount: ' . $paymentResponse->getAmount() . '<br>';
echo 'Payment ID: ' . $paymentResponse->getPaymentId() . '<br>';