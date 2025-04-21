<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Client\Repository;

use App\CreditContext\Domain\Client\Entity\Values\Pin;
use App\CreditContext\Domain\Client\Entity\Client;

interface ClientReadRepositoryInterface
{
    public function findByPin(Pin $pin): Client;
}