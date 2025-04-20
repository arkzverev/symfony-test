<?php

namespace App\CreditContext\Domain\Client\Entity;

use App\CreditContext\Domain\Client\Entity\Values\Age;
use App\CreditContext\Domain\Client\Entity\Values\Income;
use App\CreditContext\Domain\Client\Entity\Values\Pin;
use App\CreditContext\Domain\Client\Entity\Values\Score;

final class Client
{
    public function __construct(
        private Age     $age,
        private Pin     $pin,
        private Score   $score,
        private Income  $income,
    ) {
    }

    public function getAge(): Age
    {
        return $this->age;
    }

    public function getPin(): Pin
    {
        return $this->pin;
    }

    public function getScore(): Score
    {
        return $this->score;
    }

    public function getIncome(): Income
    {
        return $this->income;
    }
}