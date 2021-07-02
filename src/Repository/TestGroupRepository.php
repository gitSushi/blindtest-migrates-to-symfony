<?php

namespace App\Repository;

use App\Entity\TestGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TestGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestGroup::class);
    }

    public function getProducts()
    {
        return $this
            ->getEntityManager()
            ->createQuery(
                "SELECT p FROM App\Entity\Product p"
            )
            ->getResult();
    }
}
