<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Interface;

interface AllowOrDeclineRuleInterface
{
    public function check(): bool;

    public function getReason(): string;
}