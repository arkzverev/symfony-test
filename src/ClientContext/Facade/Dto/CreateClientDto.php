<?php

declare(strict_types=1);

namespace App\ClientContext\Facade\Dto;

use App\CommonContext\Dictionary\City;
use Symfony\Component\Validator\Constraints as Assert;

class CreateClientDto
{
    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Type('int')]
    #[Assert\Range(
        min: 18,
        max: 70,
    )]
    public int $age;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    #[Assert\Choice(
        choices: [
            City::PRAGA->value,
            City::BRNO->value,
            City::OSTRAVA->value,
        ]
    )]
    public string $city;

    #[Assert\NotBlank]
    #[Assert\Type('float')]
    public float $income;

    #[Assert\NotBlank]
    #[Assert\Type('float')]
    public float $score;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public string $pin;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public string $email;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    public string $phone;
}