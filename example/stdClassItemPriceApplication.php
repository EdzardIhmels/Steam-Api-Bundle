<?php

use EdzardIhmels\PriceOverview\Client\CsClient;
use EdzardIhmels\PriceOverview\StdObjectItemPriceOverview;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$client = new CsClient('https://steamcommunity.com/market/priceoverview/');

$application = new StdObjectItemPriceOverview($client);

var_dump($application->execute('Fracture%20Case')->success);
$pattern = '[^\d\.\,\s]';

var_dump(preg_replace($pattern, 'W3Schools', $application->execute('Fracture%20Case')->lowest_price));