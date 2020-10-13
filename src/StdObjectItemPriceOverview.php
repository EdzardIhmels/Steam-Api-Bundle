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

        return (object)json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }
}
