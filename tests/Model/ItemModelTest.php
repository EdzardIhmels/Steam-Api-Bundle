<?php

declare(strict_types = 1);

namespace Model;

use EdzardIhmels\PriceOverview\Model\ItemModel;
use Money\Money;
use PHPUnit\Framework\TestCase;

final class ItemModelTest extends TestCase
{
    private ?ItemModel $item;

    public function setUp(): void
    {
        $this->item = new ItemModel(Money::USD(100), Money::USD(101), 2000, 'testItem');
    }

    public function tearDown(): void
    {
        $this->item = null;
    }

    public function testGetLowestPrice(): void
    {
        $this->assertEquals(100, $this->item->getLowestPrice()->getAmount());
    }

    public function testGetMedianPrice(): void
    {
        $this->assertEquals(101, $this->item->getMedianPrice()->getAmount());
    }

    public function testGetVolume(): void
    {
        $this->assertEquals(2000, $this->item->getVolume());
    }

    public function testGetName():void
    {
        $this->assertEquals('testItem', $this->item->getName());
    }
}
