<?php

namespace App\DTO\Client\CBR;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CurrencyRateDTO
{
    #[SerializedName('@ID')]
    private string $id;

    #[SerializedName('NumCode')]
    private string $numCode;

    #[SerializedName('CharCode')]
    private string $charCode;

    #[SerializedName('Nominal')]
    private int $nominal;

    #[SerializedName('Name')]
    private string $name;

    #[SerializedName('Value')]
    private string $value;

    #[SerializedName('VunitRate')]
    private string $vunitRate;

    // Getters and setters
    public function getCharCode(): string
    {
        return $this->charCode;
    }

    public function setCharCode(string $charCode): void
    {
        $this->charCode = $charCode;
    }

    public function getNominal(): int
    {
        return $this->nominal;
    }

    public function setNominal(int $nominal): void
    {
        $this->nominal = $nominal;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNumCode(): string
    {
        return $this->numCode;
    }

    public function setNumCode(string $numCode): void
    {
        $this->numCode = $numCode;
    }

    public function getVunitRate(): string
    {
        return $this->vunitRate;
    }

    public function setVunitRate(string $vunitRate): void
    {
        $this->vunitRate = $vunitRate;
    }
}
