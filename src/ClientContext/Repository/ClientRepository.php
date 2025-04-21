<?php

declare(strict_types=1);

namespace App\ClientContext\Repository;

use App\ClientContext\Domain\Client\Entity\Client;
use App\ClientContext\Domain\Client\Entity\Values\Pin;
use App\ClientContext\Domain\Client\Repository\ClientRepositoryInterface;
use App\ClientContext\Infrastructure\Database\ClientStorage;
use Throwable;

class ClientRepository implements ClientRepositoryInterface
{
    public function __construct(
        private ClientStorage $clientStorage
    ){
    }

    public function create(Client $client): bool
    {
        try {
            $this->clientStorage->insert();
            return true;
        } catch (Throwable $e) {
            $this->logger->error('Error create credit datbase: ' . $e->getMessage());
            return false;
        }
    }

    public function findAll(): array
    {
        return $this->clientStorage->fetchAll();
    }

    public function findByPin(Pin $pin): Client
    {
        return $this->clientStorage->find(['pin' => $pin->getValue()]);
    }
}