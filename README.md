# Mage2 Module LeanScale KeyValue

    ``leanscale/module-keyvalue``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Key value module

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/LeanScale`
 - Enable the module by running `php bin/magento module:enable LeanScale_KeyValue`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require leanscale/module-keyvalue`
 - enable the module by running `php bin/magento module:enable LeanScale_KeyValue`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications

 - API Endpoint
	- GET - LeanScale\KeyValue\Api\KeyvalueManagementInterface > LeanScale\KeyValue\Model\KeyvalueManagement

 - API Endpoint
	- POST - LeanScale\KeyValue\Api\KeyvalueManagementInterface > LeanScale\KeyValue\Model\KeyvalueManagement

 - API Endpoint
	- DELETE - LeanScale\KeyValue\Api\KeyvalueManagementInterface > LeanScale\KeyValue\Model\KeyvalueManagement

 - Model
	- Keyvalue


## Attributes



