<?php

use EdzardIhmels\PriceOverview\Client\CsClient;
use EdzardIhmels\PriceOverview\RawJsonItemPriceOverview;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$client = new CsClient('https://steamcommunity.com/market/priceoverview/');

$application = new RawJsonItemPriceOverview($client);

var_dump($application->execute('Fracture Case')->getContent());