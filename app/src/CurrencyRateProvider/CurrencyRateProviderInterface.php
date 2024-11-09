<?php

declare(strict_types=1);

namespace App\CurrencyRateProvider;

use App\VirtualObject\CurrencyRate;

interface CurrencyRateProviderInterface
{
    /**
     * It could be collection, for simplicity, use array of objects.
     * @return array<1, CurrencyRate>
     */
    public function getRates(): array;
}
