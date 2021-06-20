<?php

namespace App\Repository;

use App\Entity\WoodCases;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WoodCases|null find($id, $lockMode = null, $lockVersion = null)
 * @method WoodCases|null findOneBy(array $criteria, array $orderBy = null)
 * @method WoodCases[]    findAll()
 * @method WoodCases[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WoodCasesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WoodCases::class);
    }

    // /**
    //  * @return WoodCases[] Returns an array of WoodCases objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WoodCases
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
