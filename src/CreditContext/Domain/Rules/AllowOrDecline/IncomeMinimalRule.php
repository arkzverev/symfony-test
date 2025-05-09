<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Rules\AllowOrDecline;

use App\CreditContext\Domain\Client\Entity\Client;
use App\CreditContext\Domain\Client\Entity\Values\Income;
use App\CreditContext\Domain\Interface\AllowOrDeclineRuleInterface;

class IncomeMinimalRule implements AllowOrDeclineRuleInterface
{
    public function __construct(
        private Client $client,
        private Income $minimalIncome,
    ) {
    }

    public function check(): bool
    {
        return $this->client->getIncome()->getValue() > $this->minimalIncome->getValue();
    }

    public function getReason(): string
    {
        return sprintf("Minimal income must be %s", $this->minimalIncome->getValue());
    }
}