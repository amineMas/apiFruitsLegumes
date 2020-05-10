<?php

namespace App\Repository;

use App\Entity\Legumes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Legumes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Legumes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Legumes[]    findAll()
 * @method Legumes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LegumesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Legumes::class);
    }

    // /**
    //  * @return Legumes[] Returns an array of Legumes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Legumes
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
