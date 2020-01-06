<?php

namespace App\Repository;

use App\Entity\CmsBlocTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CmsBlocTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmsBlocTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmsBlocTranslation[]    findAll()
 * @method CmsBlocTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmsBlocTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmsBlocTranslation::class);
    }

    // /**
    //  * @return CmsBlocTranslation[] Returns an array of CmsBlocTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CmsBlocTranslation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
