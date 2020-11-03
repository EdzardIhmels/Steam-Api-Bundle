# steam-price-overview
returns an Item Object based on the ItempriceOverview of Steam

## Requirements:

 * PHP 7.4

## Install and Usage
 ```
 composer require eihmels/steam-price-overview
 ```

take a look in 'example' to the an example

## Codequality Tools
 
### run *phpUnit*
 
      php ./vendor/bin/phpunit.phar --configuration ./phpunit.xml
      php ./vendor/bin/phpunit.phar --coverage-html ./coverage-report
      
### run phpstan

       php ./vendor/bin/phpcs.phar --standard=./ruleset.xml  ./src/*/
       php ./vendor/bin/phpcs.phar --standard=./ruleset.xml  ./tests/*
        
### run phpstan
       
       php ./vendor/bin/phpstan.phar analyse -l max  ./src/


