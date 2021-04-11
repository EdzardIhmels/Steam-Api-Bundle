<?php

declare(strict_types=1);

namespace PriceOverview;

use PriceOverview\Model\Item;

interface ApplicationInterface
{
    public function execute(string $itemName): ?Item;
}
