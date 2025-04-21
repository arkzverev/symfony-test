<?php

declare(strict_types=1);

namespace App\CreditContext\Service\Credit;

use App\ClientContext\Domain\Client\Repository\ClientRepositoryInterface;
use App\CreditContext\Domain\Client\Repository\ClientReadRepositoryInterface;
use App\CreditContext\Domain\Credit\Entity\Credit;
use App\CreditContext\Domain\Client\Entity\Values\Pin;
use App\CreditContext\Domain\Credit\Entity\Values\Amount;
use App\CreditContext\Domain\Credit\Entity\Values\Rate;
use App\CreditContext\Domain\Credit\Entity\Values\Title;
use App\CreditContext\Domain\Credit\Repository\CreditRepositoryInterface;
use App\CreditContext\Domain\Interface\AllowOrDeclineRuleInterface;
use App\CreditContext\Domain\Interface\ChangeRateInterfaceRule;
use App\CreditContext\Domain\RulesGroup\RulesGroupDefault;
use App\CreditContext\Facade\Dto\CreateCreditDto;

class CreditService
{
    public function __construct(
        private ClientReadRepositoryInterface $clientReadRepository,
        private CreditRepositoryInterface $creditRepository,
        private RulesGroupDefault $rulesGroup,
    ){
    }

    public function createCredit(CreateCreditDto $requestDto): array
    {
        $result = $this->checkCreateCredit($requestDto);
        if (!$result['status']) {
            return $result;
        }

        $credit = $this->buildCreditEntity($requestDto);
        $client = $this->clientReadRepository->findByPin(new Pin($requestDto->clientPin));

        foreach ($this->rulesGroup->getRules() as $ruleClass => $params) {
            $ruleInstance = new $ruleClass($client, ...$params);
            if ($ruleInstance instanceof ChangeRateInterfaceRule) {
                $rate = $ruleInstance->recalcRate($credit->getRate());
                $credit->setRate($rate);
            }
        }

        if ($this->creditRepository->create($credit)) {
            return [
                'status' => true,
                'credit' => $credit,
            ];
        }

        return [
            'status' => false,
        ];
    }

    public function checkCreateCredit(CreateCreditDto $requestDto): array
    {
        $client = $this->clientReadRepository->findByPin(new Pin($requestDto->clientPin));

        if ($client === null) {
            return [
                'status' => false,
                'declineReason' => 'Client not found',
            ];
        }

        foreach ($this->rulesGroup->getRules() as $ruleClass => $params) {
            $ruleInstance = new $ruleClass($client, ...$params);
            if ($ruleInstance instanceof AllowOrDeclineRuleInterface) {
                if (!$ruleInstance->check()) {
                    return [
                        'status' => false,
                        'declineReason' => $ruleInstance->getReason(),
                    ];
                }
            }
        }

        return [
            'status' => true,
        ];
    }

    private function buildCreditEntity(CreateCreditDto $requestDto): Credit
    {
        return new Credit(
            title: new Title($requestDto->title),
            amount: new Amount($requestDto->amount),
            rate: new Rate($requestDto->rate),
            startDate: new \DateTimeImmutable($requestDto->startDate),
            endDate: new \DateTimeImmutable($requestDto->endDate),
        );
    }


}