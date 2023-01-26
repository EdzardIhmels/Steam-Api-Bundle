<?php

declare(strict_types=1);

namespace PriceOverview\Client;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class SteamClient extends Client
{
    public function __construct(private string $steamURL,private string $appIdentifier)
    {
        parent::__construct([]);
    }

    public function itemRequest(string $itemName): ResponseInterface
    {
        return $this->request(
            'GET',
            $this->getApplicationURLWithItemName($itemName),
            [
                'headers' => ['Content-Type' => 'application/json'],
            ]
        );
    }

    public function getApplicationURLWithItemName(string $itemName): string
    {
        return sprintf('%s&market_hash_name=%s', $this->getApplicationURL(), $itemName);
    }

    public function getApplicationURL(): string
    {
        return sprintf('%s?appid=%s', $this->getSteamURL(), $this->getAppIdentifier());
    }

    public function getSteamURL(): string
    {
        return $this->steamURL;
    }

    public function getAppIdentifier(): string
    {
        return $this->appIdentifier;
    }
}
