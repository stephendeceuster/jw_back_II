<?php

namespace App\Repository;

use App\Entity\PhotoCases;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PhotoCases|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoCases|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoCases[]    findAll()
 * @method PhotoCases[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoCasesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoCases::class);
    }

    // /**
    //  * @return PhotoCases[] Returns an array of PhotoCases objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PhotoCases
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
