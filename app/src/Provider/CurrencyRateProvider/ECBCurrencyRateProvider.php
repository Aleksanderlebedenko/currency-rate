<?php

namespace App\Provider\CurrencyRateProvider;

use App\Enum\CurrencyEnum;
use App\Enum\ProviderEnum;
use App\Exception\CurrencyRateNotFoundException;
use App\Repository\CurrencyRateRepository;
use App\VirtualObject\CurrencyRateVO;

readonly final class ECBCurrencyRateProvider implements CurrencyRateProviderInterface
{
    private const ProviderEnum PROVIDER = ProviderEnum::ECB;

    public function __construct(
        private CurrencyRateRepository $currencyRateRepository,
    ) {
    }

    public function getLatestRate(CurrencyEnum $currency): CurrencyRateVO
    {
        $currencyRate = $this->currencyRateRepository->getLatest($currency, self::PROVIDER);

        if (null === $currencyRate) {
            throw new CurrencyRateNotFoundException();
        }

        return new CurrencyRateVO(
            $currencyRate->getCurrency(),
            $currencyRate->getBaseCurrency(),
            $currencyRate->getDate(),
            $currencyRate->getRate(),
        );
    }
}
