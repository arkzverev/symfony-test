<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Rules\AllowOrDecline;

use App\CreditContext\Domain\Client\Entity\Client;
use App\CreditContext\Domain\Client\Entity\Values\Score;
use App\CreditContext\Domain\Interface\AllowOrDeclineRuleInterface;

final class ScoreMinimalRule implements AllowOrDeclineRuleInterface
{
    public function __construct(
        private Client $client,
        private Score $minimalScore,
    ) {
    }

    public function check(): bool
    {
        return $this->client->getScore()->getValue() > $this->minimalScore->getValue();
    }

    public function getReason(): string
    {
        return sprintf("Minimal score must be %s", $this->minimalScore->getValue());
    }
}