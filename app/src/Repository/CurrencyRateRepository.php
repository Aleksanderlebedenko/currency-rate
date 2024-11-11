<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\CurrencyRate;
use App\Enum\CurrencyEnum;
use App\Enum\ProviderEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CurrencyRate>
 */
class CurrencyRateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CurrencyRate::class);
    }

    public function getLatest(
        CurrencyEnum $from,
        ProviderEnum $provider
    ): ?CurrencyRate {
        return $this->findOneBy(
            [
                'currency' => $from,
                'provider' => $provider,
            ],
            [
                'date' => 'DESC',
            ]
        );
    }
}
