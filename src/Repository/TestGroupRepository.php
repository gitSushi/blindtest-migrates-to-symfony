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

    public function getHistory()
    {
        return $this->createQueryBuilder('q')
            ->select(array('tg', 'prod'))
            ->from('TestGroup', 'tg')
            ->innerJoin('tg.product', 'prod', 'WITH', 'prod.id = 20')
            ->getQuery()
            ->getResult();
    }
}
