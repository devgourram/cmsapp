<?php

namespace App\Repository;

use App\Entity\TextImageBloc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TextImageBloc|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextImageBloc|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextImageBloc[]    findAll()
 * @method TextImageBloc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextImageBlocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextImageBloc::class);
    }

    // /**
    //  * @return TextImageBloc[] Returns an array of TextImageBloc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TextImageBloc
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
