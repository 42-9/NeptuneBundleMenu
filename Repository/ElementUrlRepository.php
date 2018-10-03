<?php

namespace ScyLabs\NeptuneBundle\Repository;

use ScyLabs\NeptuneBundle\Entity\ElementUrl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ElementUrl|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElementUrl|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElementUrl[]    findAll()
 * @method ElementUrl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementUrlRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ElementUrl::class);
    }

//    /**
//     * @return ElementUrl[] Returns an array of ElementUrl objects
//     */
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
    public function findOneBySomeField($value): ?ElementUrl
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
