<?php

declare(strict_types = 1);

namespace EdzardIhmels\PriceOverview;

use stdClass;

class StdObjectItemPriceOverview extends AbstractItemPriceOverview
{
    public function execute(string $itemName): stdClass
    {
        $response = $this->steamClient->itemRequest($itemName);

        $response->getBody()->rewind();

        $result =  (object)json_decode(
            $response->getBody()->getContents(),
            true, 512,
            JSON_THROW_ON_ERROR
        );

        $result->lowest_price = str_replace('$','',$result->lowest_price);
        $result->median_price = str_replace('$','', $result->median_price);
        $result->volume = (int)str_replace(',','', $result->volume);

        $result->currency = 'USD';

        return $result;
    }
}
