<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview;

use EdzardIhmels\PriceOverview\Client\SteamClient;

class AbstractItemPriceOverview
{
    protected SteamClient $steamClient;

    public function __construct(SteamClient $steamClient)
    {
        $this->steamClient = $steamClient;
    }
}
