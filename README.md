# Steam-Api-Bundle
connects to the Steam Api

##Requirements:

 * PHP 7.4
 ##Codequality Tools
 
 ### run *phpUnit*
 
      php ./vendor/bin/phpunit.phar --configuration ./phpunit.xml
      php ./vendor/bin/phpunit.phar --coverage-html ./coverage-report
      
### run phpstan

       php ./vendor/bin/phpcs.phar --standard=./ruleset.xml  ./src/*/
       php ./vendor/bin/phpcs.phar --standard=./ruleset.xml  ./tests/*
        
### run phpstan
       
       php ./vendor/bin/phpstan.phar analyse -l max  ./src/


