<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Rules\AllowOrDecline;

use App\CreditContext\Domain\Client\Entity\Client;
use App\CreditContext\Domain\Client\Entity\Values\City;
use App\CreditContext\Domain\Interface\AllowOrDeclineRuleInterface;

class CityAvailableRule implements AllowOrDeclineRuleInterface
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
        return in_array($clientCity, $this->cities, true);
    }

    public function getReason(): string
    {
        return "You city now not available";
    }
}