<?php

declare(strict_types=1);

namespace App\CurrencyRateProvider;

use App\Enum\ProviderEnum;
use App\VirtualObject\CurrencyRateVO;

interface CurrencyRatesProviderInterface
{
    public function getName(): ProviderEnum;

    /**
     * It could be collection, for simplicity, used array of objects.
     * @return array<int, CurrencyRateVO>
     */
    public function getRates(): array;

}
