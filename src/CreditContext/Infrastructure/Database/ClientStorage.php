<?php

declare(strict_types=1);

namespace App\CreditContext\Infrastructure\Database;

use App\CreditContext\Domain\Client\Entity\Client;
use App\CreditContext\Domain\Client\Entity\Values\Age;
use App\CreditContext\Domain\Client\Entity\Values\City;
use App\CreditContext\Domain\Client\Entity\Values\FullName;
use App\CreditContext\Domain\Client\Entity\Values\Income;
use App\CreditContext\Domain\Client\Entity\Values\Pin;
use App\CreditContext\Domain\Client\Entity\Values\Score;

class ClientStorage
{
    public function findOne($filter = []): Client
    {
        // Заглушка метода, возвращает одну тестовую запись клиента
        return new Client(
            fullName: new FullName('Ivan Ivanov'),
            age: new Age(54),
            pin: new Pin('555-777'),
            score: new Score(544),
            city: new City('PR'),
            income: new Income(1345),
        );
    }

}
