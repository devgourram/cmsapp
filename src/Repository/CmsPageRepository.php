<?php

namespace App\Repository;

use App\Entity\CmsPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CmsPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmsPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmsPage[]    findAll()
 * @method CmsPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmsPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmsPage::class);
    }

    // /**
    //  * @return CmsPage[] Returns an array of CmsPage objects
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
    public function findOneBySomeField($value): ?CmsPage
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
