<?php

declare(strict_types=1);

namespace PriceOverviewTests\Unit\Client;


use PHPUnit\Framework\TestCase;
use PriceOverview\Client\CsClient;

final class CsClientTest extends TestCase
{
    public function testAppIdentifier(): void
    {
        $client = new CsClient('test');

        self::assertEquals(CsClient::CS_API_IDENTIFIER, $client->getAppIdentifier());
    }
}
