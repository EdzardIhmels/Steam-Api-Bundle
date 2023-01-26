<?php

declare(strict_types=1);

namespace PriceOverview;

use Money\Currencies\ISOCurrencies;
use Money\Parser\IntlMoneyParser;
use NumberFormatter;
use PriceOverview\Client\SteamClient;
use PriceOverview\Model\Item;
use Throwable;

final class ModelItemPriceOverview implements ApplicationInterface
{
    public function __construct(private SteamClient $steamClient)
    {
    }

    public function execute(string $itemName): ?Item
    {
        try {
            $response = $this->steamClient->itemRequest($itemName);
        } catch (Throwable $throwable) {
            return null;
        }

        $response->getBody()->rewind();

        $currencies = new ISOCurrencies();
        $numberFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        $moneyParser = new IntlMoneyParser($numberFormatter, $currencies);

        /** @var array<string, string|int|false> $contents */
        $contents = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        if (false === isset($contents['success']) || false === $contents['success']) {
            return null;
        }

        $contents['volume'] = (int)str_replace(',', '', (string)$contents['volume']);

        return new Item(
            $moneyParser->parse((string)$contents['lowest_price']),
            $moneyParser->parse((string)$contents['median_price']),
            $contents['volume'],
            $itemName
        );
    }
}
