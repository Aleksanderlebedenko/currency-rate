<?php

namespace App\DTO;

use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\SerializedName;

class CurrencyRatesDTO
{
    #[SerializedName('@Date')]
    private DateTimeImmutable $date;

    #[SerializedName('@name')]
    private string $name;

    /**
     * @var CurrencyRateDTO[]
     */
    #[SerializedName('Valute')]
    private array $rates = [];

    // Getters and setters
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = DateTimeImmutable::createFromFormat('d.m.Y', $date) ?: new DateTimeImmutable();
    }

    /**
     * @return CurrencyRateDTO[]
     */
    public function getRates(): array
    {
        return $this->rates;
    }

    /**
     * @param CurrencyRateDTO[] $rates
     */
    public function setRates(array $rates): void
    {
        $this->rates = $rates;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
