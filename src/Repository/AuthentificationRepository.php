<?php

namespace App\Repository;

use App\Entity\Authentification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Authentification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Authentification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Authentification[]    findAll()
 * @method Authentification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthentificationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Authentification::class);
    }

    // /**
    //  * @return Authentification[] Returns an array of Authentification objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Authentification
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
