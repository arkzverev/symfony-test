<?php

declare(strict_types=1);

namespace App\ClientContext\Infrastructure\Database;

use App\ClientContext\Domain\Client\Entity\Values\Pin;
use App\ClientContext\Domain\Client\Repository\ClientRepositoryInterface;
use App\ClientContext\Domain\Client\Entity\Client;

class ClientStorage implements ClientRepositoryInterface
{
    public function create(Client $client): void
    {
        // save new client
    }

    public function findAll(): array
    {
        // get all rows
        return [];
    }

    public function findByPin(Pin $pin): Client
    {
        // find by pin
        return new Client();
    }

}
