<?php

declare(strict_types=1);

namespace App\CreditContext\Repository;

use App\CreditContext\Domain\Client\Entity\Values\Pin;
use App\CreditContext\Domain\Credit\Entity\Credit;
use App\CreditContext\Domain\Credit\Repository\CreditRepositoryInterface;
use App\CreditContext\Infrastructure\Database\CreditStorage;
use Psr\Log\LoggerInterface;
use Throwable;

class CreditRepository implements CreditRepositoryInterface
{
    public function __construct(
        private CreditStorage $creditStorage,
        private LoggerInterface $logger,
    ) {
    }

    public function create(Credit $client): bool
    {
        try {
            $this->creditStorage->insert();
            return true;
        } catch (Throwable $e) {
            $this->logger->error('Error create credit datbase: ' . $e->getMessage());
            return false;
        }
    }

    public function findAll(): array
    {
        // get all rows
        return [];
    }

    public function findByClientPin(Pin $pin): Credit
    {
        // find client by pin
        return new Credit();
    }
}