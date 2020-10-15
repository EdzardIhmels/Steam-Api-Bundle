<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview\Model;

use Money\Money;

interface ItemModelInterface
{
    public function getLowestPrice(): Money;

    public function getMedianPrice(): Money;
}
