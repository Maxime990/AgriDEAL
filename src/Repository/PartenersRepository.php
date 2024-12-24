<?php

namespace App\Repository;

use App\Entity\Parteners;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Parteners|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parteners|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parteners[]    findAll()
 * @method Parteners[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartenersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parteners::class);
    }

    // /**
    //  * @return Parteners[] Returns an array of Parteners objects
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
    public function findOneBySomeField($value): ?Parteners
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
