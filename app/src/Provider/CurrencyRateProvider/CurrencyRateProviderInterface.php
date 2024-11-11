<?php

declare(strict_types=1);

namespace App\Provider\CurrencyRateProvider;

use App\Enum\CurrencyEnum;
use App\Exception\CurrencyRateNotFoundException;
use App\VirtualObject\CurrencyRateVO;

interface CurrencyRateProviderInterface
{
    /**
     * @throws CurrencyRateNotFoundException
     */
    public function getLatestRate(CurrencyEnum $currency): CurrencyRateVO;
}
