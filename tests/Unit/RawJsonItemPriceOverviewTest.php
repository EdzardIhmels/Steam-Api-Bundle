<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview\Tests\Unit;

use EdzardIhmels\PriceOverview\JsonItemPriceOverview;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

final class RawJsonItemPriceOverviewTest extends ApplicationTest
{
    public function testResponseCode(): void
    {
        $application = new JsonItemPriceOverview($this->steamClient);

        $result = $application->execute('test');

        self::assertEquals(SymfonyResponse::HTTP_OK, $result->getStatusCode());
    }

    public function testBody(): void
    {
        $json = file_get_contents(__DIR__ . '/../Responses/success.json');

        $application = new JsonItemPriceOverview($this->steamClient);

        $result = $application->execute('test');

        self::assertEquals($result->getContent(), $json);
    }
}
