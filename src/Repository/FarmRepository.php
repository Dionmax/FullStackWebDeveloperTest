<?php

namespace App\Repository;

use App\Entity\Farm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Farm>
 */
class FarmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Farm::class);
    }

    public function findAllBasicInformation()
    {
        return $this->createQueryBuilder('f')
            ->select('f.id', 'f.name')
            ->join('f.cows', 'c')
            ->addSelect('SUM(c.milkProduction) as mp')
            ->addSelect('SUM(c.weeklyFeed) as wf')
            ->addSelect('
                        (SELECT COUNT(c1.id)
                        FROM App\Entity\Cow c1
                        WHERE c1.farm = f.id
                        AND (CURRENT_DATE() - c1.birth) <= 365
                        AND c1.weeklyFeed > 500) as tc
            ')
            ->groupBy('f.id')
            ->getQuery()
            ->getDQL();
    }
}
