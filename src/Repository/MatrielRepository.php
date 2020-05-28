<?php

namespace App\Repository;

use App\Entity\Matriel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Matriel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matriel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matriel[]    findAll()
 * @method Matriel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatrielRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matriel::class);
    }

    // /**
    //  * @return Matriel[] Returns an array of Matriel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Matriel
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
