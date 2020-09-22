<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview\Model;

use Brick\Money\Money;

class ItemModel implements ItemModelInterface
{
    private Money $lowestPrice;
    private Money $medianPrice;

    public function __construct(Money $lowestPrice, Money $medianPrice)
    {
        $this->lowestPrice = $lowestPrice;
        $this->medianPrice = $medianPrice;
    }

    public function getLowestPrice(): Money
    {
        return $this->lowestPrice;
    }

    public function getMedianPrice(): Money
    {
        return $this->medianPrice;
    }
}
