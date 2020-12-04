<?php

declare(strict_types=1);

namespace EdzardIhmels\PriceOverview;

use EdzardIhmels\PriceOverview\Client\SteamClient;
use EdzardIhmels\PriceOverview\Model\Item;
use Money\Currencies\ISOCurrencies;
use Money\Parser\IntlMoneyParser;
use NumberFormatter;
use Throwable;

final class ModelItemPriceOverview implements ApplicationInterface
{
    private SteamClient $steamClient;

    public function __construct(SteamClient $steamClient)
    {
        $this->steamClient = $steamClient;
    }

    public function execute(string $itemName): ?Item
    {
        try {
            $response = $this->steamClient->itemRequest($itemName);
        } catch (Throwable $trowable) {
            return null;
        }


        $response->getBody()->rewind();

        $currencies = new ISOCurrencies();
        $numberFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        $moneyParser = new IntlMoneyParser($numberFormatter, $currencies);

        $response = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        if (false === $response['success']) {
            return null;
        }
        $response['volume'] = (int)str_replace(',', '', $response['volume']);

        return new Item(
            $moneyParser->parse($response['lowest_price']),
            $moneyParser->parse($response['median_price']),
            $response['volume'],
            $itemName
        );
    }
}
