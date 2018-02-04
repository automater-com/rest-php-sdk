<?php
namespace AutomaterSDK\Client;

use AutomaterSDK\Exception\ApiException;
use AutomaterSDK\Exception\NotFoundException;
use AutomaterSDK\Exception\TooManyRequestsException;
use AutomaterSDK\Exception\UnauthorizedException;
use AutomaterSDK\Request\PaymentRequest;
use AutomaterSDK\Request\ProductsRequest;
use AutomaterSDK\Request\TransactionRequest;
use AutomaterSDK\Response\Entity\Product;
use AutomaterSDK\Response\PaymentResponse;
use AutomaterSDK\Response\ProductsResponse;
use AutomaterSDK\Response\TransactionResponse;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\Request;

class Client
{
    protected $apiKey;
    protected $apiSecret;

    protected $_guzzle;

    const STATUS_SUCCESS = "success";
    const STATUS_ERROR = "error";

    public function __construct($apiKey, $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;

        $this->_guzzle = new \GuzzleHttp\Client([
            'timeout' => 30,
            'base_url' => 'https://automater.pl/rest/api/',
            'headers' => [
                'X-Api-Key' => $apiKey
            ]
        ]);
    }

    /**
     * Get products from Automater.
     *
     * @param ProductsRequest $productsRequest
     * @return ProductsResponse
     * @throws ApiException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws TooManyRequestsException
     */
    public function getProducts(ProductsRequest $productsRequest)
    {
        $request = $this->_guzzle->createRequest('GET', 'products.json', [
            'query' => $productsRequest->toArray()
        ]);

        $response = $this->_handleSyncRequest($request);

        return ProductsResponse::create($response);
    }

    /**
     * Get product details from Automater.
     *
     * @param int $productId
     * @return Product
     * @throws ApiException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws TooManyRequestsException
     */
    public function getProductDetails($productId)
    {
        $request = $this->_guzzle->createRequest('GET', 'products/' . $productId . '.json');

        $response = $this->_handleSyncRequest($request);

        return Product::create($response['product']);
    }

    /**
     * Create new transaction.
     *
     * @param TransactionRequest $transactionRequest
     * @return TransactionResponse
     * @throws ApiException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws TooManyRequestsException
     */
    public function createTransaction(TransactionRequest $transactionRequest)
    {
        $request = $this->_guzzle->createRequest('POST', 'transactions.json', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'X-Api-Sign' => $transactionRequest->getSignature($this->apiSecret)
            ],
            'body' => $transactionRequest->toArray()
        ]);

        $response = $this->_handleSyncRequest($request);

        return TransactionResponse::create($response);
    }

    /**
     * Post payment for cart transaction.
     *
     * @param int $cartId
     * @param PaymentRequest $paymentRequest
     * @return PaymentResponse
     * @throws ApiException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws TooManyRequestsException
     */
    public function postPayment($cartId, PaymentRequest $paymentRequest)
    {
        $request = $this->_guzzle->createRequest('POST', 'transactions/' . $cartId . '/payment.json', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'X-Api-Sign' => $paymentRequest->getSignature($this->apiSecret)
            ],
            'body' => $paymentRequest->toArray()
        ]);

        $response = $this->_handleSyncRequest($request);

        return PaymentResponse::create($response);
    }

    /**
     * Handles requests made to Automater API.
     *
     * @param Request $request
     * @return bool|mixed
     * @throws ApiException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws TooManyRequestsException
     */
    protected function _handleSyncRequest(Request $request)
    {
        try {
            $response = $this->_guzzle->send($request);
            $result = json_decode($response->getBody(), true);

            if (strcasecmp($result['status'], self::STATUS_SUCCESS) !== 0) {
                throw new ApiException($result['code'], $result['message']);
            }

            $result = $result['data'];
        } catch (RequestException $exception) {
            $this->_handleRequestException($exception);
            return false;
        }

        return $result;
    }

    /**
     * Handles errors from communication.
     *
     * @param RequestException $requestException
     * @throws ApiException
     * @throws NotFoundException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    protected function _handleRequestException(RequestException $requestException)
    {
        $response = $requestException->getResponse()->getBody();

        switch ($requestException->getCode()) {
            case 401:
                throw new UnauthorizedException();
                break;
            case 404:
                throw new NotFoundException();
                break;
            case 429:
                $json = json_decode($response, true);
                throw new TooManyRequestsException($json['message']);
            case 500:
                $json = json_decode($response, true);
                throw new ApiException($json['code'], $json['message']);
                break;
        }

        throw new ApiException($requestException->getCode(), "Unknown error: " . $requestException->getMessage().". Body: " . $response);
    }
}