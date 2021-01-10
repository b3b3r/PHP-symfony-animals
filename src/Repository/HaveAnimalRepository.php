<?php

namespace App\Repository;

use App\Entity\HaveAnimal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HaveAnimal|null find($id, $lockMode = null, $lockVersion = null)
 * @method HaveAnimal|null findOneBy(array $criteria, array $orderBy = null)
 * @method HaveAnimal[]    findAll()
 * @method HaveAnimal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HaveAnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HaveAnimal::class);
    }

    // /**
    //  * @return HaveAnimal[] Returns an array of HaveAnimal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HaveAnimal
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
