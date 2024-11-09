<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\CurrencyEnum;
use App\Enum\ProviderEnum;
use App\Repository\CurrencyRateRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrencyRateRepository::class)]
class CurrencyRate
{
    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 3, enumType: CurrencyEnum::class)]
    private CurrencyEnum $currency;

    #[ORM\Column(type: Types::DECIMAL, precision: 18, scale: 8)]
    private string $rate;

    #[ORM\Column]
    private DateTimeImmutable $date;

    #[ORM\Column(type: 'string', length: 64, enumType: ProviderEnum::class)]
    private ProviderEnum $provider;

    #[ORM\Column]
    private DateTimeImmutable $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    public function setCurrency(CurrencyEnum $currency): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function getRate(): string
    {
        return $this->rate;
    }

    public function setRate(string $rate): static
    {
        $this->rate = $rate;

        return $this;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getProvider(): ProviderEnum
    {
        return $this->provider;
    }

    public function setProvider(ProviderEnum $provider): static
    {
        $this->provider = $provider;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
