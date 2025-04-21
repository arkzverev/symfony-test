<?php

declare(strict_types=1);

namespace App\CreditContext\Service\Client;

use App\CreditContext\Domain\Client\Entity\Values\Pin;
use App\CreditContext\Domain\Client\Entity\Client;
use App\CreditContext\Domain\Client\Repository\ClientReadRepositoryInterface;
use App\CreditContext\Infrastructure\Database\ClientStorage;

class ClientRepository implements ClientReadRepositoryInterface
{
    public function __construct(
        private ClientStorage $clientStorage
    ){
    }

    public function findByPin(Pin $pin): Client
    {
        return $this->clientStorage->findOne(['pin' => $pin->getValue()]);
    }
}