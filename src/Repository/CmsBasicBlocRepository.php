<?php

namespace App\Repository;

use App\Entity\CmsBasicBloc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CmsBasicBloc|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmsBasicBloc|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmsBasicBloc[]    findAll()
 * @method CmsBasicBloc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmsBasicBlocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmsBasicBloc::class);
    }

    // /**
    //  * @return CmsBasicBloc[] Returns an array of CmsBasicBloc objects
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
    public function findOneBySomeField($value): ?CmsBasicBloc
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
