<?php

use EdzardIhmels\PriceOverview\Client\CsClient;
use EdzardIhmels\PriceOverview\ModelItemPriceOverview;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$client = new CsClient('https://steamcommunity.com/market/priceoverview/');

$application = new ModelItemPriceOverview($client);

var_dump($application->execute('Fractasure Case'));