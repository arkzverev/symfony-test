<?php

declare(strict_types=1);

namespace App\CreditContext\Facade\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class CreateCreditDto
{
    public $name;

    public $amount;

    public $rate;

    public $startDate;

    public $endDate;

}