<?php

declare(strict_types=1);

namespace App\VirtualObject;

use App\Enum\CurrencyEnum;

class CurrencyRateVO
{
    public function __construct(
        CurrencyEnum $currency,
        float $rate,
    ) {
    }
}
