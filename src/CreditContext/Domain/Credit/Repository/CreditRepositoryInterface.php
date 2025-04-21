<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Credit\Repository;

use App\CreditContext\Domain\Client\Entity\Values\Pin;
use App\CreditContext\Domain\Credit\Entity\Credit;

interface CreditRepositoryInterface
{
    public function create(Credit $credit): bool;

    public function findAll(): array;

    public function findByClientPin(Pin $pin): Credit;
}