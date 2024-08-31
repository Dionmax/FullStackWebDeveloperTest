<?php

namespace App\Repository;

use App\Entity\Cow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cow>
 */
class CowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cow::class);
    }

    public function findAllAnimalsForSlaughter(int $farmId)
    {
        return $this->createQueryBuilder('c')
            ->select('c.id', 'c.milkProduction', '((CURRENT_DATE() - c.birth) / 365) as birth', 'c.weeklyFeed', 'c.weight')
            ->where('c.farm = :farmId')
            ->setParameter('farmId', $farmId)
            ->andWhere('
                        ((CURRENT_DATE() - c.birth) >= 365 * 5 )
                        OR (c.milkProduction < 40) 
                        OR (c.milkProduction < 70 AND c.weeklyFeed / 7 > 50) 
                        OR (c.weight / 14.688 > 18)
                    ')
            ->getQuery()
            ->getDQL();
    }
}
