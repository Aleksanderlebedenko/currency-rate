<?php

declare(strict_types=1);

namespace App\Service;

use App\CurrencyRateProvider\CurrencyRatesProviderInterface;
use App\Entity\CurrencyRate;
use App\Enum\ProviderEnum;
use App\VirtualObject\CurrencyRateVO;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\NoReturn;

final readonly class UpdateRates
{
    public function __construct(
        private EntityManagerInterface $em,
    ) {
    }

    #[NoReturn] public function updateRates(CurrencyRatesProviderInterface ...$currencyRateProviders): void
    {
        foreach ($currencyRateProviders as $currencyRateProvider) {
            $rates = $currencyRateProvider->getRates();

            $this->convertAndPersistRates($currencyRateProvider->getName(), ...$rates);
        }

        $this->em->flush();
    }

    /**
     * @param CurrencyRateVO[] $rates
     */
    private function convertAndPersistRates(ProviderEnum $provider, CurrencyRateVO ...$rates): void
    {
        foreach ($rates as $rate) {
            $currencyRate = new CurrencyRate();
            $currencyRate->setCurrency($rate->currency);
            $currencyRate->setBaseCurrency($rate->baseCurrency);
            $currencyRate->setRate($rate->rate);
            $currencyRate->setDate($rate->date);
            $currencyRate->setProvider($provider);

            $this->em->persist($currencyRate);
        }
    }
}
