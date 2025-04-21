<?php

declare(strict_types=1);

namespace App\ClientContext\Domain\Client\Repository;

use App\ClientContext\Domain\Client\Entity\Values\Pin;
use App\ClientContext\Domain\Client\Entity\Client;

interface ClientRepositoryInterface
{
    public function create(Client $client): bool;

    public function findAll(): array;

    public function findByPin(Pin $pin): Client;
}