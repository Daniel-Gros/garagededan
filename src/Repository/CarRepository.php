<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function findByCriteria(array $criteria): array
    {
        $queryBuilder = $this->createQueryBuilder('c');

        if (!empty($criteria['minKilometers'])) {
            $queryBuilder->where('c.kilometers >= :minKilometers')
                ->setParameter('minKilometers', $criteria['minKilometers']);
        }
        foreach ($criteria as $field => $value) {
            switch ($field) {
                case 'maxKilometers':
                    if (!empty($value)) {
                        $queryBuilder->andWhere('c.kilometers <= :maxKilometers')
                            ->setParameter('maxKilometers', $value);
                    }
                    break;
                case 'minPrice':
                    if (!empty($value)) {
                        $queryBuilder->andWhere('c.price >= :minPrice')
                            ->setParameter('minPrice', $value);
                    }
                    break;
                case 'maxPrice':
                    if (!empty($value)) {
                        $queryBuilder->andWhere('c.price <= :maxPrice')
                            ->setParameter('maxPrice', $value);
                    }
                    break;
                case 'minYear':
                    if (!empty($value)) {
                        $queryBuilder->andWhere('c.year >= :minYear')
                            ->setParameter('minYear', $value);
                    }
                    break;
                case 'maxYear':
                    if (!empty($value)) {
                        $queryBuilder->andWhere('c.year <= :maxYear')
                            ->setParameter('maxYear', $value);
                    }
                    break;
            }
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
