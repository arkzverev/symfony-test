<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Rules\AllowOrDecline;

use App\CreditContext\Domain\Client\Entity\Client;
use App\CreditContext\Domain\Client\Entity\Values\Age;
use App\CreditContext\Domain\Interface\AllowOrDeclineRuleInterface;

class AgeRangeRule implements AllowOrDeclineRuleInterface
{
    public function __construct(
        private Client $client,
        private Age $minimalAge,
        private Age $maximalAge,
    ) {
    }

    public function check(): bool
    {
        $checkAge = $this->client->getAge()->getValue();
        return $checkAge >= $this->minimalAge->getValue() && $checkAge <= $this->maximalAge->getValue();
    }

    public function getReason(): string
    {
        return sprintf("Age must be from %s to %s", $this->minimalAge->getValue(), $this->maximalAge->getValue());
    }
}