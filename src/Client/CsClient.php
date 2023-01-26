<?php

declare(strict_types=1);

namespace PriceOverview\Client;

use GuzzleHttp\Client;

final class CsClient extends SteamClient
{
    public const CS_API_IDENTIFIER = '730';

    public function __construct(string $steamURL, Client $client)
    {
        parent::__construct($steamURL, self::CS_API_IDENTIFIER, $client);
    }
}
