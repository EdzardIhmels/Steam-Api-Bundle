<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview\Tests\Unit\Model;

use EdzardIhmels\PriceOverview\Model\Item;
use Money\Money;
use PHPUnit\Framework\TestCase;

final class ItemModelTest extends TestCase
{
    private ?Item $item;

    public function setUp(): void
    {
        $this->item = new Item(Money::USD(100), Money::USD(101), 2000, 'testItem');
    }

    public function tearDown(): void
    {
        $this->item = null;
    }

    public function testGetLowestPrice(): void
    {
        self::assertEquals(100, $this->item->getLowestPrice()->getAmount());
    }

    public function testGetMedianPrice(): void
    {
        self::assertEquals(101, $this->item->getMedianPrice()->getAmount());
    }

    public function testGetVolume(): void
    {
        self::assertEquals(2000, $this->item->getVolume());
    }

    public function testGetName(): void
    {
        self::assertEquals('testItem', $this->item->getName());
    }
}
