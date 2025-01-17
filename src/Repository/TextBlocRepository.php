<?php

namespace App\Repository;

use App\Entity\TextBloc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TextBloc|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextBloc|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextBloc[]    findAll()
 * @method TextBloc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextBlocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextBloc::class);
    }

    // /**
    //  * @return TextBloc[] Returns an array of TextBloc objects
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
    public function findOneBySomeField($value): ?TextBloc
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
