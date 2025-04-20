<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Rules\Interface;

interface AllowOrDeclineRuleInterface
{
    public function check(): bool;
}