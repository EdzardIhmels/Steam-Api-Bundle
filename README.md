# steam-price-overview
returns an Item Object based on the ItempriceOverview of Steam

## Dependencies



## Requirements:

 * ``` >= PHP 8.0 ```

## Install and Usage
 ```
 composer require eihmels/steam-price-overview
 ```

you can send a request to the market/priceOverview/ api from Steam. via the ModelItemPriceOverview.

execute will return a Item, which looks like this:
```
item:
  Money lowestPrice 
  Money medianPrice
  int volume
  string name
  ```
### lowestPrice 
[Money/Money](https://github.com/moneyphp/money) value in Dollar

### medianPrice
[Money/Money](https://github.com/moneyphp/money) value in Dollar. The average price at which the item has been sold. See the [Steam marketplace](https://steamcommunity.com/market/listings/730/StatTrak%E2%84%A2%20P250%20%7C%20Steel%20Disruption%20%28Factory%20New%29) item graph for a better understanding on how the median is calculated.

### volume
a integer value - the total number of this specific item which has been sold/bought.

### name
string value with the name of the Item.

## Codequality Tools
 
### run *phpUnit*
 
      php ./vendor/bin/phpunit.phar --configuration ./phpunit.xml
      php ./vendor/bin/phpunit.phar --coverage-html ./coverage-report
      
### run phpstan

       php ./vendor/bin/phpcs.phar --standard=./ruleset.xml  ./src/*/
       php ./vendor/bin/phpcs.phar --standard=./ruleset.xml  ./tests/*
        
### run phpstan
       
       php ./vendor/bin/phpstan.phar analyse -l max  ./src/


