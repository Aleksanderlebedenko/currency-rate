<?php

namespace App\DTO\Client\ECB;

use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\SerializedName;

class CubeDateDTO
{
    #[SerializedName('@time')]
    private DateTimeImmutable $date;

    /**
     * @var RateDTO[]
     */
    #[SerializedName('Cube')]
    private array $rates = [];

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = DateTimeImmutable::createFromFormat('Y-m-d', $date) ?: new DateTimeImmutable();
    }

    /**
     * @return RateDTO[]
     */
    public function getRates(): array
    {
        return $this->rates;
    }

    public function setRates(array $rates): void
    {
        $this->rates = $rates;
    }
}
