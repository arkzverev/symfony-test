<?php

declare(strict_types=1);

namespace App\CommonContext\Entity\Values;

use DateTimeImmutable;

abstract class DateTime
{
    public function __construct(
        protected DateTimeImmutable $value,
    ) {
    }

    final public function getValue(): DateTimeImmutable
    {
        return $this->value;
    }
}
