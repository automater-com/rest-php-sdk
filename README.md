# PHP SDK for Automater RESTful API
This repository contains Automater's PHP SDK and samples for REST API.
### Prerequisites
First you need API key and API secret - you can generate it by login to Automater, next going to "Settings / settings" tab and select "API" from left-side menu. 
This dependency works with PHP >= 5.5.
### Installation
[Composer](https://getcomposer.org/) is the recommended way to install the SDK. To use the SDK with your project, add the following dependency to your application's composer.json:
```
"require": {
  	"automater-pl/rest-php-sdk" : "^0.1"
}
```
or add this depenedency by running:
```
composer require automater-pl/rest-php-sdk:^0.1
```
### Examples
1. [List products from Automater account](https://github.com/automater-pl/rest-php-sdk/blob/master/examples/ListProducts.php)
2. [Create new transaction](https://github.com/automater-pl/rest-php-sdk/blob/master/examples/NewTransaction.php)
3. [Post payment for transaction](https://github.com/automater-pl/rest-php-sdk/blob/master/examples/PostPayment.php)
4. [Get product details](https://github.com/automater-pl/rest-php-sdk/blob/master/examples/GetProductDetails.php)
5. [List databases from Automater account](https://github.com/automater-pl/rest-php-sdk/blob/master/examples/ListDatabases.php)
6. [Get database details](https://github.com/automater-pl/rest-php-sdk/blob/master/examples/GetDatabase.php)
7. [Create new database](https://github.com/automater-pl/rest-php-sdk/blob/master/examples/CreateDatabase.php)
8. [Add codes to database](https://github.com/automater-pl/rest-php-sdk/blob/master/examples/AddCodes.php)
9. [Add file to database](https://github.com/automater-pl/rest-php-sdk/blob/master/examples/UploadFile.php)