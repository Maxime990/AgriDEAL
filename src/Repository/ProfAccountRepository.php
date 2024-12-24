<?php

namespace App\Repository;

use App\Entity\ProfAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProfAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfAccount[]    findAll()
 * @method ProfAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfAccount::class);
    }

    // /**
    //  * @return ProfAccount[] Returns an array of ProfAccount objects
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
    public function findOneBySomeField($value): ?ProfAccount
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
