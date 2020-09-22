<?php

use EdzardIhmels\PriceOverview\Client\CsClient;
use EdzardIhmels\PriceOverview\RawJsonItemPriceOverviewApplication;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$client = new CsClient('https://steamcommunity.com/market/priceoverview/');

$application = new RawJsonItemPriceOverviewApplication($client);

var_dump($application->execute('Fracture%20Case')->getContent());