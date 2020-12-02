<?php

namespace App\Repository;

use App\Entity\RaidBoost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RaidBoost|null find($id, $lockMode = null, $lockVersion = null)
 * @method RaidBoost|null findOneBy(array $criteria, array $orderBy = null)
 * @method RaidBoost[]    findAll()
 * @method RaidBoost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RaidBoostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RaidBoost::class);
    }

    // /**
    //  * @return RaidBoost[] Returns an array of RaidBoost objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RaidBoost
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
