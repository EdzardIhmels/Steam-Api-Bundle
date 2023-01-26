<?php

declare(strict_types=1);

namespace PriceOverviewTests\Unit\Client;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use PriceOverview\Client\CsClient;

final class CsClientTest extends TestCase
{
    protected function setUp(): void
    {
        $this->client = new Client();
    }

    public function testAppIdentifier(): void
    {
        $client = new CsClient('test', $this->client);

        self::assertEquals(CsClient::CS_API_IDENTIFIER, $client->getAppIdentifier());
    }
}
