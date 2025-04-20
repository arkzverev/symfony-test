<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Credit\Entity;

use App\CreditContext\Credit\Entity\Lifetime;
use App\CreditContext\Domain\Credit\Entity\Values\Amount;
use App\CreditContext\Domain\Credit\Entity\Values\Rate;
use App\CreditContext\Domain\Credit\Entity\Values\Title;

final class Credit
{
    public function __construct(
        private Title    $title,
        private Amount   $amount,
        private Rate     $rate,
        private Lifetime $lifetime,
    ) {
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function getAmount(): Amount
    {
        return $this->amount;
    }

    public function getRate(): Rate
    {
        return $this->rate;
    }

    public function getLifetime(): Lifetime
    {
        return $this->lifetime;
    }


}