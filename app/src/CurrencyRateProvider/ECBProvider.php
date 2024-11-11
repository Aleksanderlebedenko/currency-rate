<?php

namespace App\CurrencyRateProvider;

use App\DTO\Client\ECB\WrapperWrapperCubeDTO;
use App\Enum\CurrencyEnum;
use App\Enum\ProviderEnum;
use App\VirtualObject\CurrencyRateVO;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

readonly final class ECBProvider implements CurrencyRatesProviderInterface
{
    private const CurrencyEnum BASE_CURRENCY = CurrencyEnum::EUR;
    public function __construct(
        private HttpClientInterface $httpClient,
        private SerializerInterface $serializer,
        private string $url,
    ) {
    }

    public function getName(): ProviderEnum
    {
        return ProviderEnum::ECB;
    }

    /**
     * @inheritDoc
     */
    public function getRates(): array
    {
        $response = $this->httpClient->request('GET', $this->url);

        $currencyRatesDTO = $this->serializer->deserialize(
            $response->getContent(),
            WrapperWrapperCubeDTO::class,
            'xml',
        );

        $content = $currencyRatesDTO->getWrapperCube()[0]->getCubeDates()[0];
        $date = $content->getDate();

        $rates = [];
        $rates[] = new CurrencyRateVO(
            self::BASE_CURRENCY,
            self::BASE_CURRENCY,
            $date,
            '1',
        );
        foreach ($content->getRates() as $rate) {
            $rates[] = new CurrencyRateVO(
                CurrencyEnum::from($rate->getCurrency()),
                self::BASE_CURRENCY,
                $date,
                (string)$rate->getRate(),
            );
        }

        return $rates;
    }
}
