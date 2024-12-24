<?php

namespace App\Repository;

use App\Entity\ShoppBuyer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShoppBuyer|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShoppBuyer|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShoppBuyer[]    findAll()
 * @method ShoppBuyer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoppBuyerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShoppBuyer::class);
    }

    // /**
    //  * @return ShoppBuyer[] Returns an array of ShoppBuyer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ShoppBuyer
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
