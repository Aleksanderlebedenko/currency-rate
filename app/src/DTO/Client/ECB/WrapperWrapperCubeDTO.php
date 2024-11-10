<?php

namespace App\DTO\Client\ECB;

use Symfony\Component\Serializer\Annotation\SerializedName;

class WrapperWrapperCubeDTO
{
    /**
     * @var WrapperCubeDTO[]
     */
    #[SerializedName('Cube')]
    private array $wrapperCube = [];

    /**
     * @return WrapperCubeDTO[]
     */
    public function getWrapperCube(): array
    {
        return $this->wrapperCube;
    }

    public function setWrapperCube(array $wrapperCube): void
    {
        $this->wrapperCube = $wrapperCube;
    }
}
