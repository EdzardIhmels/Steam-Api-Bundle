<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview\Tests\Unit\Client;

use EdzardIhmels\PriceOverview\Client\CsClient;
use EdzardIhmels\PriceOverview\Client\SteamClient;
use PHPUnit\Framework\TestCase;

final class SteamClientTest extends TestCase
{
    public function testApplicationURl(): void
    {
        $client = new SteamClient('test/', CsClient::CS_API_IDENTIFIER);

        self::assertEquals(sprintf('test/?appid=%s', CsClient::CS_API_IDENTIFIER), $client->getApplicationURL());
    }

    public function testApplicationUrlWithItemName(): void
    {
        $client = new SteamClient('test/', CsClient::CS_API_IDENTIFIER);

        self::assertEquals(
            sprintf('test/?appid=%s&market_hash_name=testItem', CsClient::CS_API_IDENTIFIER),
            $client->getApplicationURLwithItemName('testItem')
        );
    }
}
