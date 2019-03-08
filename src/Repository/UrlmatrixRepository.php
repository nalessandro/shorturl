<?php

namespace App\Repository;

use App\Entity\Urlmatrix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Urlmatrix|null find($id, $lockMode = null, $lockVersion = null)
 * @method Urlmatrix|null findOneBy(array $criteria, array $orderBy = null)
 * @method Urlmatrix[]    findAll()
 * @method Urlmatrix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrlmatrixRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Urlmatrix::class);
    }

    // /**
    //  * @return Urlmatrix[] Returns an array of Urlmatrix objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Urlmatrix
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
