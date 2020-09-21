<?php

declare(strict_types = 1);

namespace EdzardIhmels\PriceOverview;

use EdzardIhmels\PriceOverView\Client\SteamClient;
use Symfony\Component\HttpFoundation\JsonResponse;

class RawJsonItemPriceOverviewApplication
{
    private SteamClient $steamClient;

    public function __construct(
        SteamClient $steamClient
    ) {
        $this->steamClient = $steamClient;
    }

    public function execute(string $itemName): JsonResponse
    {
        $response = $this->steamClient->itemRequest($itemName);

        $response->getBody()->rewind();

        return new JsonResponse(json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR));
    }

}
