<?php

namespace App\CreditContext\Domain\Client\Entity;

use App\CreditContext\Domain\Client\Entity\Values\FullName;
use App\CreditContext\Domain\Client\Entity\Values\Age;
use App\CreditContext\Domain\Client\Entity\Values\City;
use App\CreditContext\Domain\Client\Entity\Values\Income;
use App\CreditContext\Domain\Client\Entity\Values\Pin;
use App\CreditContext\Domain\Client\Entity\Values\Score;

final class Client
{
    public function __construct(
        private FullName $fullName,
        private Age     $age,
        private Pin     $pin,
        private City    $city,
        private Score   $score,
        private Income  $income,
    ) {
    }

    public function getName(): FullName
    {
        return $this->fullName;
    }

    public function getAge(): Age
    {
        return $this->age;
    }

    public function getPin(): Pin
    {
        return $this->pin;
    }

    public function getCity(): City
    {
        return $this->city;
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