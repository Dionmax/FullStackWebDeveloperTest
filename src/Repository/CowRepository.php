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

    public function findAllCows()
    {
        return $this->createQueryBuilder('c')
            ->select('c.id', 'c.milkProduction', '((CURRENT_DATE() - c.birth) / 365.00) as birth', 'c.weeklyFeed', 'c.weight', 'c.Slaughtered')
            ->getQuery()
            ->getDQL();
    }

    public function findAllCowsForSlaughter(int $farmId)
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
            ->andWhere('c.Slaughtered = false')
            ->getQuery()
            ->getDQL();
    }

    public function findAllCowsIdForSlaughter(int $farmId)
    {
        return $this->createQueryBuilder('c')
            ->select('c.id')
            ->where('c.farm = :farmId')
            ->setParameter('farmId', $farmId)
            ->andWhere('
                        ((CURRENT_DATE() - c.birth) >= 365 * 5 )
                        OR (c.milkProduction < 40) 
                        OR (c.milkProduction < 70 AND c.weeklyFeed / 7 > 50) 
                        OR (c.weight / 14.688 > 18)
                    ')
            ->andWhere('c.Slaughtered = false')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
}
