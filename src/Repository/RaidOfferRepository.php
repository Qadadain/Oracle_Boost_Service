<?php

namespace App\Repository;

use App\Entity\RaidOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RaidOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method RaidOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method RaidOffer[]    findAll()
 * @method RaidOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RaidOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RaidOffer::class);
    }

    // /**
    //  * @return RaidOffer[] Returns an array of RaidOffer objects
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
    public function findOneBySomeField($value): ?RaidOffer
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
