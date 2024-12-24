<?php

namespace App\Repository;

use App\Entity\SearchEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SearchEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method SearchEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method SearchEntity[]    findAll()
 * @method SearchEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SearchEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SearchEntity::class);
    }

    // /**
    //  * @return SearchEntity[] Returns an array of SearchEntity objects
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
    public function findOneBySomeField($value): ?SearchEntity
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
