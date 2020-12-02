<?php

namespace App\Repository;

use App\Entity\InformationBoost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InformationBoost|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationBoost|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationBoost[]    findAll()
 * @method InformationBoost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationBoostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationBoost::class);
    }

    // /**
    //  * @return InformationBoost[] Returns an array of InformationBoost objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InformationBoost
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
