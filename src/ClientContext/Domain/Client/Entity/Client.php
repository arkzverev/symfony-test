<?php

declare(strict_types=1);

namespace App\ClientContext\Domain\Client\Entity;

use App\ClientContext\Domain\Client\Entity\Values\Age;
use App\ClientContext\Domain\Client\Entity\Values\Email;
use App\ClientContext\Domain\Client\Entity\Values\City;
use App\ClientContext\Domain\Client\Entity\Values\FullName;
use App\ClientContext\Domain\Client\Entity\Values\Income;
use App\ClientContext\Domain\Client\Entity\Values\Phone;
use App\ClientContext\Domain\Client\Entity\Values\Pin;
use App\ClientContext\Domain\Client\Entity\Values\Score;

final class Client
{
    public function __construct(
        private FullName $fullName,
        private City $city,
        private Age $age,
        private Pin $pin,
        private Email $email,
        private Phone $phone,
        private Score $score,
        private Income $income,
    ) {
    }

    public function exportArray()
    {
        return [
            'fullName' => $this->fullName->getValue(),
            'city' => $this->city->getValue(),
            'age' => $this->age->getValue(),
            'pin' => $this->pin->getValue(),
            'email' => $this->email->getValue(),
            'phone' => $this->phone->getValue(),
            'score' => $this->score->getValue(),
            'income' => $this->income->getValue(),
        ];
    }

    public function getFullName(): FullName
    {
        return $this->fullName;
    }

    public function getCity(): City
    {
        return $this->city;
    }

    public function getAge(): Age
    {
        return $this->age;
    }

    public function getPin(): Pin
    {
        return $this->pin;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
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
