<?php

declare(strict_types=1);

namespace App\ClientContext\Infrastructure\Database;

use App\ClientContext\Domain\Client\Entity\Client;

class ClientStorage
{
    public function insert(): void
    {
        // save new client
    }

    public function fetchAll(): array
    {
        // get all rows
        return [];
    }

    public function find(array $filter = []): array
    {
        // find by pin
        return new Client();
    }

}
