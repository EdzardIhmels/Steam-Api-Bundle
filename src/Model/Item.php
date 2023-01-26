<?php

declare(strict_types=1);

namespace PriceOverview\Model;

use Money\Money;

final class Item
{
    public function __construct(
        private Money $lowestPrice,
        private Money $medianPrice,
        private int $volume,
        private string $name
    ) {
    }

    public function getLowestPrice(): Money
    {
        return $this->lowestPrice;
    }

    public function getMedianPrice(): Money
    {
        return $this->medianPrice;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
