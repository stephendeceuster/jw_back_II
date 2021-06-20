<?php

namespace App\Repository;

use App\Entity\WoodTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WoodTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method WoodTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method WoodTypes[]    findAll()
 * @method WoodTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WoodTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WoodTypes::class);
    }

    // /**
    //  * @return WoodTypes[] Returns an array of WoodTypes objects
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
    public function findOneBySomeField($value): ?WoodTypes
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
