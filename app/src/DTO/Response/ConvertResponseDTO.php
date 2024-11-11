<?php

declare(strict_types=1);

namespace App\DTO\Response;

readonly class ConvertResponseDTO
{
    public function __construct(
        public string $from,
        public string $to,
        public string $requestedAmount,
        public string $convertedAmount,
    ) {
    }
}
