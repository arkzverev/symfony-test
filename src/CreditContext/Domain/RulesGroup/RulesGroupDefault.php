<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\RulesGroup;

use App\CommonContext\Dictionary\City as CityList;
use App\CreditContext\Domain\Client\Entity\Values\City;
use App\CreditContext\Domain\Client\Entity\Values\Age;
use App\CreditContext\Domain\Client\Entity\Values\Income;
use App\CreditContext\Domain\Client\Entity\Values\Score;
use App\CreditContext\Domain\Credit\Entity\Values\Rate;
use App\CreditContext\Domain\Interface\RulesGroupInterface;
use App\CreditContext\Domain\Rules\AllowOrDecline\AgeRangeRule;
use App\CreditContext\Domain\Rules\AllowOrDecline\CityAvailableRule;
use App\CreditContext\Domain\Rules\AllowOrDecline\CityRandomDeclineRule;
use App\CreditContext\Domain\Rules\AllowOrDecline\IncomeMinimalRule;
use App\CreditContext\Domain\Rules\AllowOrDecline\ScoreMinimalRule;
use App\CreditContext\Domain\Rules\ChangeRate\CityAddPercentRule;

class RulesGroupDefault implements RulesGroupInterface
{
    private const GROUP_ID = 'rules_group_default';

    public function getGroupId(): string
    {
        return self::GROUP_ID;
    }

    public function getRules(): array
    {
        return [
            AgeRangeRule::class => [
                new Age(30),
                new Age(60)
            ],
            CityAvailableRule::class => [
                [CityList::PRAGA->value, CityList::BRNO->value, CityList::OSTRAVA->value]
            ],
            CityRandomDeclineRule::class => [
                [new City(CityList::PRAGA->value)]
            ],
            IncomeMinimalRule::class => [
                new Income(1000)
            ],
            ScoreMinimalRule::class => [
                new Score(500)
            ],
            CityAddPercentRule::class => [
                [new City(CityList::OSTRAVA->value)],
                new Rate(5),
            ],
        ];
    }
}