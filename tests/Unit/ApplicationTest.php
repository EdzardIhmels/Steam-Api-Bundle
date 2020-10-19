<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview\Tests\Unit;

use EdzardIhmels\PriceOverview\Client\SteamClient;
use EdzardIhmels\PriceOverview\Tests\Factory\ResponseFactory;
use Mockery;
use PHPUnit\Framework\TestCase;

abstract class ApplicationTest extends TestCase
{
    public ?SteamClient $steamClient;

    protected function setUp(): void
    {
        $this->steamClient = Mockery::mock(SteamClient::class);
        $this->steamClient->shouldReceive('itemRequest')->andReturn(ResponseFactory::createSuccess());
    }

    protected function tearDown(): void
    {
        $this->steamClient = null;
    }
}
