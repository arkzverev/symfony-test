<?php

declare(strict_types=1);

namespace App\CreditContext\Repository;

use App\CreditContext\Domain\Client\Entity\Values\Pin;
use App\CreditContext\Domain\Credit\Entity\Credit;
use App\CreditContext\Domain\Credit\Entity\Values\Amount;
use App\CreditContext\Domain\Credit\Entity\Values\Rate;
use App\CreditContext\Domain\Credit\Entity\Values\Title;
use App\CreditContext\Domain\Credit\Repository\CreditRepositoryInterface;
use App\CreditContext\Infrastructure\Database\CreditStorage;
use Psr\Log\LoggerInterface;
use DateTimeImmutable;
use Throwable;

class CreditRepository implements CreditRepositoryInterface
{
    public function __construct(
        private CreditStorage $creditStorage,
        private LoggerInterface $logger,
    ) {
    }

    public function create(Credit $credit): bool
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
        return new Credit(
            title: new Title('test'),
            amount: new Amount(500),
            rate: new Rate(5),
            startDate: new DateTimeImmutable(),
            endDate: new DateTimeImmutable(),
        );
    }
}