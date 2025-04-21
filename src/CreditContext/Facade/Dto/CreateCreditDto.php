<?php

declare(strict_types=1);

namespace App\CreditContext\Facade\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class CreateCreditDto
{
    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public string $title;

    #[Assert\NotBlank]
    #[Assert\Type('float')]
    public float $amount;

    #[Assert\NotBlank]
    #[Assert\Type('float')]
    public float $rate;

    #[Assert\NotBlank]
    #[Assert\DateTime]
    public string $startDate;

    #[Assert\NotBlank]
    #[Assert\DateTime]
    public string $endDate;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public string $clientPin;
}