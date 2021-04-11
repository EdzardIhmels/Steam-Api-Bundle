<?php

declare(strict_types=1);

namespace PriceOverviewTests\Factory;

use GuzzleHttp\Psr7\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class ResponseFactory
{
    public static function createSuccess(): Response
    {
        $json = file_get_contents(__DIR__ . '/../Responses/success.json');

        return new Response(SymfonyResponse::HTTP_OK, [], $json);
    }
}
