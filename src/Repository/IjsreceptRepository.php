<?php

namespace App\Repository;

use App\Entity\Ijsrecept;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ijsrecept|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ijsrecept|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ijsrecept[]    findAll()
 * @method Ijsrecept[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IjsreceptRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ijsrecept::class);
    }

    // /**
    //  * @return Ijsrecept[] Returns an array of Ijsrecept objects
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
    public function findOneBySomeField($value): ?Ijsrecept
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
