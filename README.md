# PHP SDK for Automater RESTful API
This repository contains Automater's PHP SDK and samples for REST API.
### Prerequisites
First you need API key and API secret - you can generate it by login to Automater, next going to "Settings / settings" tab and select "API" from left-side menu. 
This dependency works with PHP >= 5.5.
### Installation
[Composer](https://getcomposer.org/) is the recommended way to install the SDK. To use the SDK with your project, add the following dependency to your application's composer.json:
```
"require": {
  	"automater/rest-php-sdk" : "^0.1"
}
```
or add this depenedency by running:
```
composer require automater/rest-php-sdk:^0.1
```
### Examples
1. [List products from Automater account](#)
2. [Create new transaction](#)
3. [Post payment for transaction](#)