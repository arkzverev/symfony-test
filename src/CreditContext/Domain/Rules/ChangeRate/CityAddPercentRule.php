<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Rules\ChangeRate;

use App\ClientContext\Domain\Client\Entity\Values\City;
use App\CreditContext\Domain\Client\Entity\Client;
use App\CreditContext\Domain\Credit\Entity\Values\Rate;
use App\CreditContext\Domain\Interface\ChangeRateInterfaceRule;

class CityAddPercentRule implements ChangeRateInterfaceRule
{
    /** @var array<int, City> $cities */
    public function __construct(
        private Client $client,
        private array $cities,
        private Rate $changeRate,
    ) {
    }

    public function recalcRate(Rate $currentRate): Rate
    {
        $clientCity = $this->client->getCity()->getValue();
        if (!in_array($clientCity, $this->cities, true)) {
            $rateValue = $currentRate->getValue() + $this->changeRate->getValue();
            return new Rate($rateValue);
        }

        return $currentRate;
    }
}