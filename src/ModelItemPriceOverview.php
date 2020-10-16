<?php

declare(strict_types = 1);

namespace EdzardIhmels\PriceOverview;

use EdzardIhmels\PriceOverview\Model\ItemModel;
use Money\Currencies\ISOCurrencies;
use Money\Parser\IntlMoneyParser;
use NumberFormatter;

final class ModelItemPriceOverview extends AbstractItemPriceOverview
{
    public function execute(string $itemName): ItemModel
    {
        $response = $this->steamClient->itemRequest($itemName);

        $response->getBody()->rewind();

        $currencies = new ISOCurrencies();
        $numberFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        $moneyParser = new IntlMoneyParser($numberFormatter, $currencies);

        $response = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        $response['volume'] = (int)str_replace(',', '', $response['volume']);

        return new ItemModel(
            $moneyParser->parse($response['lowest_price']),
            $moneyParser->parse($response['median_price']),
            $response['volume'],
            $itemName
        );
    }
}
