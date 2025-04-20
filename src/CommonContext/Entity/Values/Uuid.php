<?php

declare(strict_types=1);

namespace App\CommonContext\Entity\Values;

use Stringable;
use Symfony\Component\Uid\Uuid as BaseUuid;

abstract class Uuid extends BaseUuid implements Stringable
{
    public function __construct(
        protected string $value
    ) {
        parent::__construct($this->value);
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    final public function getValue(): string
    {
        return $this->value;
    }
}
