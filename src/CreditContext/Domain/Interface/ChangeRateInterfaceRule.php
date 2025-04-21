<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Interface;

use App\CreditContext\Domain\Credit\Entity\Values\Rate;

interface ChangeRateInterfaceRule
{
    public function recalcRate(Rate $currentRate): Rate;
}