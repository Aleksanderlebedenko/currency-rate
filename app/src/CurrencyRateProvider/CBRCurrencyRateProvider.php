<?php

namespace App\CurrencyRateProvider;

use App\Enum\CurrencyEnum;
use App\Enum\ProviderEnum;
use App\Exception\CurrencyRateNotFoundException;
use App\Repository\CurrencyRateRepository;
use App\VirtualObject\CurrencyRateVO;

readonly final class CBRCurrencyRateProvider implements CurrencyRateProviderInterface
{
    private const ProviderEnum PROVIDER = ProviderEnum::CBR;

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
            1 / $currencyRate->getRate(), //TODO: find more sophisticated approach to calculate rate
        );
    }
}
