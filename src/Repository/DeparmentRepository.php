<?php

namespace App\Repository;

use App\Entity\Deparment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Deparment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Deparment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Deparment[]    findAll()
 * @method Deparment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeparmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Deparment::class);
    }

    // /**
    //  * @return Deparment[] Returns an array of Deparment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Deparment
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
