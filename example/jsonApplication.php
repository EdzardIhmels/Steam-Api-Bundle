<?php

use EdzardIhmels\PriceOverview\Client\CsClient;
use EdzardIhmels\PriceOverview\JsonItemPriceOverview;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$client = new CsClient('https://steamcommunity.com/market/priceoverview/');

$application = new JsonItemPriceOverview($client);

var_dump($application->execute('Fracsfgsdgture Case'));