<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function findByCriteria($criteria)
    {
        $qb = $this->createQueryBuilder('c');

        if (isset($criteria['minKilometers'])) {
            $qb->andWhere('c.kilometers >= :minKilometers')
                ->setParameter('minKilometers', $criteria['minKilometers']);
        }

        if (isset($criteria['maxKilometers'])) {
            $qb->andWhere('c.kilometers <= :maxKilometers')
                ->setParameter('maxKilometers', $criteria['maxKilometers']);
        }

        if (isset($criteria['minPrice'])) {
            $qb->andWhere('c.price >= :minPrice')
                ->setParameter('minPrice', $criteria['minPrice']);
        }

        if (isset($criteria['maxPrice'])) {
            $qb->andWhere('c.price <= :maxPrice')
                ->setParameter('maxPrice', $criteria['maxPrice']);
        }

        if (isset($criteria['minYear'])) {
            $qb->andWhere('c.year >= :minYear')
                ->setParameter('minYear', $criteria['minYear']);
        }

        if (isset($criteria['maxYear'])) {
            $qb->andWhere('c.year <= :maxYear')
                ->setParameter('maxYear', $criteria['maxYear']);
        }

        return $qb->getQuery()->getResult();
    }

    //    public function findOneBySomeField($value): ?Car
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
