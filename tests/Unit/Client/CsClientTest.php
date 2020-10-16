<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview\Tests\Unit\Client;

use EdzardIhmels\PriceOverview\Client\CsClient;
use PHPUnit\Framework\TestCase;

final class CsClientTest extends TestCase
{
    public function testAppIdentifier(): void
    {
        $client = new CsClient('test');

        self::assertEquals(CsClient::CS_API_IDENTIFIER, $client->getAppIdentifier());
    }
}
