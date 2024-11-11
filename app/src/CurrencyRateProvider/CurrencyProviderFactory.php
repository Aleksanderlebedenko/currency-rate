<?php

namespace App\CurrencyRateProvider;

use App\Enum\ProviderEnum;
use InvalidArgumentException;
use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;

#[Autoconfigure]
readonly class CurrencyProviderFactory
{
    public function __construct(
        private CbrCurrencyRateProvider $cbrCurrencyRateProvider,
        private EcbCurrencyRateProvider $ecbCurrencyRateProvider,
    ) {
    }

    public function createProvider(string $provider): CurrencyRateProviderInterface
    {
        return match ($provider) {
            ProviderEnum::CBR->value => $this->cbrCurrencyRateProvider,
            ProviderEnum::ECB->value => $this->ecbCurrencyRateProvider,
            default => throw new InvalidArgumentException("Invalid currency provider: $provider"),
        };
    }
}
