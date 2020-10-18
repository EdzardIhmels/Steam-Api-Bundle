<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview;

use Symfony\Component\HttpFoundation\JsonResponse;

final class RawJsonItemPriceOverview extends AbstractItemPriceOverview
{
    public function execute(string $itemName): JsonResponse
    {
        $response = $this->steamClient->itemRequest($itemName);

        $response->getBody()->rewind();

        return  JsonResponse::fromJsonString($response->getBody()->getContents(), $response->getStatusCode());
    }
}
