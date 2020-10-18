<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview\Tests\Unit;

use EdzardIhmels\PriceOverview\Client\SteamClient;
use EdzardIhmels\PriceOverview\RawJsonItemPriceOverview;
use GuzzleHttp\Psr7\Response;
use Mockery;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class RawJsonItemPriceOverviewTest extends TestCase
{
    private ?SteamClient $steamClient;

    protected function setUp(): void
    {
        $this->steamClient = Mockery::mock(SteamClient::class);
    }

    public function testResponseCode(): void
    {
        $json = file_get_contents(__DIR__ . '/../Responses/success.json');

        $response = new Response(SymfonyResponse::HTTP_OK, [], $json);

        $this->steamClient->shouldReceive('itemRequest')->andReturn($response);

        $application = new RawJsonItemPriceOverview($this->steamClient);

        $result = $application->execute('test');

        self::assertEquals(SymfonyResponse::HTTP_OK, $result->getStatusCode());
    }

    public function testBody(): void
    {
        $json = file_get_contents(__DIR__ . '/../Responses/success.json');

        $response = new Response(SymfonyResponse::HTTP_OK, [], $json);

        $this->steamClient->shouldReceive('itemRequest')->andReturn($response);

        $application = new RawJsonItemPriceOverview($this->steamClient);

        $result = $application->execute('test');

        self::assertEquals($result->getContent(), $json);
    }
}
