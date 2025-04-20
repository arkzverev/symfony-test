<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Credit\Entity\Values;

use App\CommonContext\Entity\Values\DateTime;

final class Lifetime
{
    public function __construct(
        private DateTime $startDate,
        private DateTime $endDate,
    ) {
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }


}
