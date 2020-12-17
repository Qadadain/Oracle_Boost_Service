<?php

namespace App\Repository;

use App\Entity\InformationRaid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InformationRaid|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationRaid|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationRaid[]    findAll()
 * @method InformationRaid[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationRaidRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationRaid::class);
    }

    // /**
    //  * @return InformationRaid[] Returns an array of InformationRaid objects
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
    public function findOneBySomeField($value): ?InformationRaid
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
