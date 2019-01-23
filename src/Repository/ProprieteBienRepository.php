<?php

namespace App\Repository;

use App\Entity\ProprieteBien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProprieteBien|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProprieteBien|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProprieteBien[]    findAll()
 * @method ProprieteBien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProprieteBienRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProprieteBien::class);
    }

    public function latestBien()
    {
        return $this->createQueryBuilder('b')
            ->orderBy('b.make_at', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return ProprieteBien[] Returns an array of ProprieteBien objects
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
    public function findOneBySomeField($value): ?ProprieteBien
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
