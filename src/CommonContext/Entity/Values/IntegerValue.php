<?php

declare(strict_types=1);

namespace App\CommonContext\Entity\Values;

abstract class IntegerValue
{
    public function __construct(
        protected int $value,
    ) {
    }

    final public function getValue(): int
    {
        return $this->value;
    }
}
