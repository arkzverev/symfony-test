<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Credit\Entity;

use DateTimeImmutable;
use App\CreditContext\Domain\Credit\Entity\Values\Amount;
use App\CreditContext\Domain\Credit\Entity\Values\Rate;
use App\CreditContext\Domain\Credit\Entity\Values\Title;

final class Credit
{
    public function __construct(
        private Title    $title,
        private Amount   $amount,
        private Rate     $rate,
        private DateTimeImmutable $startDate,
        private DateTimeImmutable $endDate,
    ) {
    }

    public function exportArray(): array
    {
        return [
            'title' => $this->title->getValue(),
            'amount' => $this->amount->getValue(),
            'rate' => $this->rate->getValue(),
            'startDate' => $this->startDate->format('Y-m-d H:i:s'),
            'endDate' => $this->endDate->format('Y-m-d H:i:s'),
        ];
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

    public function getStartDate(): DateTimeImmutable
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setRate(Rate $rate): void
    {
        $this->rate = $rate;
    }
}