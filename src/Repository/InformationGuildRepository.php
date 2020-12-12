<?php

namespace App\Repository;

use App\Entity\InformationGuild;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InformationGuild|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationGuild|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationGuild[]    findAll()
 * @method InformationGuild[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationGuildRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationGuild::class);
    }

    // /**
    //  * @return InformationGuild[] Returns an array of InformationGuild objects
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
    public function findOneBySomeField($value): ?InformationGuild
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
