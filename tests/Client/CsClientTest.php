<?php

declare(strict_types=1);

namespace Client;

use EdzardIhmels\PriceOverview\Client\CsClient;
use PHPUnit\Framework\TestCase;

final class CsClientTest extends TestCase
{
    public function testAppIdentifier(): void
    {
        $client = new CsClient('test');

        $this->assertEquals(CsClient::CS_API_IDENTIFIER, $client->getAppIdentifier());
    }
}
