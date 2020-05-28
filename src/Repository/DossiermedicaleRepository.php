<?php

namespace App\Repository;

use App\Entity\Dossiermedicale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dossiermedicale|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dossiermedicale|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dossiermedicale[]    findAll()
 * @method Dossiermedicale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossiermedicaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dossiermedicale::class);
    }

    // /**
    //  * @return Dossiermedicale[] Returns an array of Dossiermedicale objects
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
    public function findOneBySomeField($value): ?Dossiermedicale
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
