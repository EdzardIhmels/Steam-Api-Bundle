<?php

declare(strict_types=1);

namespace Unit\Client;

use GuzzleHttp\Client;
use PriceOverview\Client\CsClient;
use PriceOverview\Client\SteamClient;
use PHPUnit\Framework\TestCase;

final class SteamClientTest extends TestCase
{
    private Client $client;

    protected function setUp(): void
    {
        $this->client = new Client();
    }

    public function testApplicationURl(): void
    {
        $client = new SteamClient('test/', CsClient::CS_API_IDENTIFIER, $this->client);

        self::assertEquals(sprintf('test/?appid=%s', CsClient::CS_API_IDENTIFIER), $client->getApplicationURL());
    }

    public function testApplicationUrlWithItemName(): void
    {
        $client = new SteamClient('test/', CsClient::CS_API_IDENTIFIER, $this->client);

        self::assertEquals(
            sprintf('test/?appid=%s&market_hash_name=testItem', CsClient::CS_API_IDENTIFIER),
            $client->getApplicationURLWithItemName('testItem')
        );
    }
}
