<?php

declare(strict_types=1);

namespace App\ClientContext\Service\Client;

use App\ClientContext\Domain\Client\Entity\Client;
use App\ClientContext\Domain\Client\Entity\Values\FullName;
use App\ClientContext\Domain\Client\Entity\Values\City;
use App\ClientContext\Domain\Client\Entity\Values\Age;
use App\ClientContext\Domain\Client\Entity\Values\Pin;
use App\ClientContext\Domain\Client\Entity\Values\Email;
use App\ClientContext\Domain\Client\Entity\Values\Phone;
use App\ClientContext\Domain\Client\Entity\Values\Score;
use App\ClientContext\Domain\Client\Entity\Values\Income;
use App\ClientContext\Domain\Client\Repository\ClientRepositoryInterface;
use App\ClientContext\Facade\Dto\CreateClientDto;

class ClientService
{
    public function __construct(
        private ClientRepositoryInterface $clientRepository,
    ) {
    }

    public function createClient(CreateClientDto $requestDto)
    {
        $client = $this->buildClientEntity($requestDto);
        $this->clientRepository->create($client);

        return $client;
    }

    private function buildClientEntity(CreateClientDto $requestDto): Client
    {
        return new Client(
            fullName: new FullName($requestDto->name),
            city: new City($requestDto->city),
            age: new Age($requestDto->age),
            pin: new Pin($requestDto->pin),
            email: new Email($requestDto->email),
            phone: new Phone($requestDto->phone),
            score: new Score($requestDto->score),
            income: new Income($requestDto->income),
        );
    }
}