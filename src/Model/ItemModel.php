<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview\Model;

use Money\Money;

class ItemModel implements ItemModelInterface
{
    private Money $lowestPrice;
    private Money $medianPrice;
    private int $volume;
    private string $name;

    public function __construct(Money $lowestPrice, Money $medianPrice, int $volume, string $name)
    {
        $this->lowestPrice = $lowestPrice;
        $this->medianPrice = $medianPrice;
        $this->volume = $volume;
        $this->name = $name;
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
