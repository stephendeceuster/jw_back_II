<?php

namespace App\Repository;

use App\Entity\WoodCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WoodCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method WoodCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method WoodCategories[]    findAll()
 * @method WoodCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WoodCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WoodCategories::class);
    }

    // /**
    //  * @return WoodCategories[] Returns an array of WoodCategories objects
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
    public function findOneBySomeField($value): ?WoodCategories
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
