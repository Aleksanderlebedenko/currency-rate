<?php

namespace App\CurrencyRateProvider;

use App\DTO\CurrencyRatesDTO;
use App\Enum\CurrencyEnum;
use App\Enum\ProviderEnum;
use App\VirtualObject\CurrencyRateVO;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

readonly final class CBRProvider implements CurrencyRateProviderInterface
{
    private const CurrencyEnum BASE_CURRENCY = CurrencyEnum::RUB;

    public function __construct(
        private HttpClientInterface $httpClient,
        private SerializerInterface $serializer,
        private string $url,
    ) {
    }

    public function getName(): ProviderEnum
    {
        return ProviderEnum::CBR;
    }

    /**
     * @inheritDoc
     */
    public function getRates(): array
    {
        $response = $this->httpClient->request('GET', $this->url);

        $currencyRatesDTO = $this->serializer->deserialize(
            $response->getContent(),
            CurrencyRatesDTO::class,
            'xml',
        );

        $rates = [];
        foreach ($currencyRatesDTO->getRates() as $rate) {
            $rates[] = new CurrencyRateVO(
                CurrencyEnum::from($rate->getCharCode()),
                self::BASE_CURRENCY,
                $currencyRatesDTO->getDate(),
                str_replace(',', '.', $rate->getValue()),
            );
        }

        return $rates;
    }
}
