<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview;

use Symfony\Component\HttpFoundation\JsonResponse;

final class JsonItemPriceOverview extends AbstractItemPriceOverview
{
    public function execute(string $itemName): JsonResponse
    {
        $response = $this->steamClient->itemRequest($itemName);

        $response->getBody()->rewind();

        return new JsonResponse(
            $response->getBody()->getContents(),
            $response->getStatusCode(),
            $response->getHeaders(),
            true
        );
    }
}
