<?php

declare(strict_types=1);

namespace App\CommonContext\Entity\Values;

abstract class FloatValue
{
    public function __construct(
        protected float $value,
    ) {
    }

    final public function getValue(): float
    {
        return $this->value;
    }
}
