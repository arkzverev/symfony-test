<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Rules\ChangeRate;

use App\CreditContext\Domain\Client\Entity\Client;
use App\ClientContext\Domain\Client\Entity\Values\City;
use App\CreditContext\Domain\Rules\Interface\ChangeRateInterfaceRule;

class CityAddPercentRule implements ChangeRateInterfaceRule
{
    /** @var array<int, City> $cities */
    public function __construct(
        private Client $client,
        private array $cities,
    ) {
    }

    public function recalcRate(float $currentRate, $changeRate): float
    {
        $clientCity = $this->client->getCity()->getValue();
        if (!in_array($clientCity, $this->cities, true)) {
            return $currentRate + $changeRate;
        }

        return $changeRate;
    }
}