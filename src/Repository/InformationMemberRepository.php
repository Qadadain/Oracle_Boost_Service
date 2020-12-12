<?php

namespace App\Repository;

use App\Entity\InformationMember;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InformationMember|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationMember|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationMember[]    findAll()
 * @method InformationMember[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationMemberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationMember::class);
    }

    // /**
    //  * @return InformationMember[] Returns an array of InformationMember objects
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
    public function findOneBySomeField($value): ?InformationMember
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
