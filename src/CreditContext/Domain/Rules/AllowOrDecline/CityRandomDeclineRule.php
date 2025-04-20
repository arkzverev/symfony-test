<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Rules\AllowOrDecline;

use App\CreditContext\Domain\Client\Entity\Client;
use App\CreditContext\Domain\Client\Entity\Values\City;
use App\CreditContext\Domain\Rules\Interface\AllowOrDeclineRuleInterface;

class CityRandomDeclineRule implements AllowOrDeclineRuleInterface
{
    /** @var array<int, City> $cities */
    public function __construct(
        private Client $client,
        private array $cities,
    ) {
    }

    public function check(): bool
    {
        $clientCity = $this->client->getCity()->getValue();
        if (!in_array($clientCity, $this->cities, true)) {
            return true;
        }

        if (mt_rand(0, 5) !== 2) {
            return true;
        }

        return false;
    }
}