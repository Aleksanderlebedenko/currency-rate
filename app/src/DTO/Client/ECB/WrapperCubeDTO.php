<?php

namespace App\DTO\Client\ECB;

use Symfony\Component\Serializer\Annotation\SerializedName;

class WrapperCubeDTO
{
    /**
     * @var CubeDateDTO[]
     */
    #[SerializedName('Cube')]
    private array $cubeDates = [];

    /**
     * @return CubeDateDTO[]
     */
    public function getCubeDates(): array
    {
        return $this->cubeDates;
    }

    public function setCubeDates(array $cubeDates): void
    {
        $this->cubeDates = $cubeDates;
    }
}
