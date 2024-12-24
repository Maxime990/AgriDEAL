<?php

namespace App\Repository;

use App\Entity\ShopAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShopAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShopAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShopAccount[]    findAll()
 * @method ShopAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShopAccount::class);
    }

    // /**
    //  * @return ShopAccount[] Returns an array of ShopAccount objects
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
    public function findOneBySomeField($value): ?ShopAccount
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
