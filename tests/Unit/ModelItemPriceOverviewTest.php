<?php

declare(strict_types=1);

namespace PriceOverviewTests\Unit;

use PriceOverview\ModelItemPriceOverview;

final class ModelItemPriceOverviewTest extends ApplicationTest
{
    private ?ModelItemPriceOverview $application;

    protected function setUp(): void
    {
        parent::setUp();
        $this->application = new ModelItemPriceOverview($this->steamClient);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->application = null;
    }

    public function testGetVolume(): void
    {
        $item = $this->application->execute('test');

        self::assertEquals(54377, $item->getVolume());
    }

    public function testGetLowestPriceAmount(): void
    {
        $item = $this->application->execute('test');

        self::assertEquals(98, $item->getLowestPrice()->getAmount());
    }

    public function testGetLowestPriceCurrency(): void
    {
        $item = $this->application->execute('test');

        self::assertEquals('USD', $item->getLowestPrice()->getCurrency());
    }

    public function testGetMedianPriceAmount(): void
    {
        $item = $this->application->execute('test');

        self::assertEquals(95, $item->getMedianPrice()->getAmount());
    }

    public function testGetMedianPriceCurrency(): void
    {
        $item = $this->application->execute('test');

        self::assertEquals('USD', $item->getMedianPrice()->getCurrency());
    }

    public function testGetName(): void
    {
        $item = $this->application->execute('test');

        self::assertEquals('test', $item->getName());
    }
}
