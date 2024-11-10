<?php

namespace App\DTO\Client\ECB;

use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\SerializedName;

class RateDTO
{
    #[SerializedName('@currency')]
    private string $currency;

    #[SerializedName('@rate')]
    private float $rate;

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }
}
