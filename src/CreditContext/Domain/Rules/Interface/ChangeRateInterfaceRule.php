<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Rules\Interface;

interface ChangeRateInterfaceRule
{
    public function recalcRate(float $currentRate, $changeRate): float;
}