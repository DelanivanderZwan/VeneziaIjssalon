<?php

namespace App\Repository;

use App\Entity\Bestelregel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Bestelregel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bestelregel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bestelregel[]    findAll()
 * @method Bestelregel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BestelregelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bestelregel::class);
    }

    // /**
    //  * @return Bestelregel[] Returns an array of Bestelregel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bestelregel
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
