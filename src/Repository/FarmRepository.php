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

    public function findAllFarm()
    {
        return $this->createQueryBuilder('f')
            ->select('f.id', 'f.name', 'f.size', 'f.manager')
            ->getQuery()
            ->getDQL();
    }

    public function findAllBasicInformation()
    {
        return $this->createQueryBuilder('f')
            ->select('f.id', 'f.name')
            ->leftJoin('f.cows', 'c', 'WITH', 'c.Slaughtered = false')
            ->addSelect('SUM(c.milkProduction) as mp')
            ->addSelect('SUM(c.weeklyFeed) as wf')
            ->addSelect('COUNT(c.id) as cc')
            ->addSelect('
                        (SELECT COUNT(c1.id)
                        FROM App\Entity\Cow c1
                        WHERE c1.farm = f.id
                        AND (CURRENT_DATE() - c1.birth) <= 365
                        AND c1.weeklyFeed > 500
                        AND c1.Slaughtered = false
                        ) as tc
            ')
            ->groupBy('f.id')
            ->getQuery()
            ->getDQL();
    }

    public function findSlaughteredCows(int $farmId)
    {
        return $this->createQueryBuilder('f')
            ->select('c.id', 'c.milkProduction', '((CURRENT_DATE() - c.birth) / 365) as birth', 'c.weeklyFeed', 'c.weight')
            ->join('f.cows', 'c')
            ->where('f.id = :farmId')
            ->setParameter('farmId', $farmId)
            ->andWhere('c.Slaughtered = true')
            ->getQuery()
            ->getDQL();
    }

    public function findCountCowsSlaughtered(int $farmId)
    {
        return $this->createQueryBuilder('f')
            ->select('COUNT(c.id) as cc')
            ->join('f.cows', 'c')
            ->where('f.id = :farmId')
            ->setParameter('farmId', $farmId)
            ->andWhere('c.Slaughtered = true')
            ->getQuery()
            ->getResult();
    }
}
