<?php

declare(strict_types=1);

namespace App\ClientContext\Service\Client;

use App\ClientContext\Domain\Client\Entity\Values\Pin;
use App\ClientContext\Domain\Client\Repository\ClientRepositoryInterface;
use App\ClientContext\Infrastructure\Database\ClientStorage;
use App\ClientContext\Domain\Client\Entity\Client;

class ClientRepository implements ClientRepositoryInterface
{
    public function __construct(
        private ClientStorage $clientStorage
    ){
    }

    public function create(Client $client): void
    {
        $this->clientStorage->create($client);
    }

    public function findAll(): array
    {
        return $this->clientStorage->findAll();
    }

    public function findByPin(Pin $pin): Client
    {
        return $this->clientStorage->findByPin($pin);
    }
}