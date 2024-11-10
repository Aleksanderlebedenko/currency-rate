<?php

declare(strict_types=1);

namespace App\VirtualObject;

use App\Enum\CurrencyEnum;
use DateTimeImmutable;

readonly class CurrencyRateVO
{
    public function __construct(
        public CurrencyEnum $currency,
        public CurrencyEnum $baseCurrency,
        public DateTimeImmutable $date,
        public string $rate,
    ) {
    }
}
