<?php

declare(strict_types=1);

namespace App\CreditContext\Domain\Interface;

interface RulesGroupInterface
{
    public function getGroupId(): string;

    /** @return array<int, AllowOrDeclineRuleInterface|ChangeRateInterfaceRule> */
    public function getRules(): array;
}