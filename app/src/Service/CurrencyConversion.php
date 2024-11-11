<?php

declare(strict_types=1);

namespace App\Service;

use App\Enum\CurrencyEnum;
use App\Provider\CurrencyRateProvider\CurrencyRateProviderInterface;

final readonly class CurrencyConversion
{
    public function __construct(
        private CurrencyRateProviderInterface $currencyRateProvider,
    ) {
    }

    public function convert(CurrencyEnum $from, CurrencyEnum $to, float $amount): float
    {

        $fromToBaseRate = $this->currencyRateProvider->getLatestRate($from);

        $toToBaseRate = $this->currencyRateProvider->getLatestRate($to);

        // TODO: add more sophisticated conversion logic (some dedicated libraries).
        return $amount * ($toToBaseRate->rate / $fromToBaseRate->rate);
    }
}
