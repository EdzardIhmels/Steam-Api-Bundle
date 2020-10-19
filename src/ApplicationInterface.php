<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview;

use EdzardIhmels\PriceOverview\Model\Item;

interface ApplicationInterface
{
    public function execute(string $itemName): Item;
}
