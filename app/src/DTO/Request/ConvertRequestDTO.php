<?php

declare(strict_types=1);

namespace App\DTO\Request;

use App\Enum\CurrencyEnum;

readonly class ConvertRequestDTO
{
    public function __construct(
        public CurrencyEnum $from,
        public CurrencyEnum $to,
        public float $amount, // Could be Money object, float for simplicity
    ) {
    }
}
