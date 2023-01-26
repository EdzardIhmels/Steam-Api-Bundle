<?php

declare(strict_types=1);

namespace PriceOverview\Client;

final class CsClient extends SteamClient
{
    public const CS_API_IDENTIFIER = '730';

    public function __construct(string $steamURL)
    {
        parent::__construct($steamURL, self::CS_API_IDENTIFIER);
    }
}
