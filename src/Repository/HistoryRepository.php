<?php

namespace App\Repository;

use App\Entity\TestGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestGroup::class);
    }

    public function getNativeHistory()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql =
            "SELECT emp.reference_employee, prod.name AS pname, prod.has_product_passed_test, tg.name, prod.test_group_id
            FROM test_group AS tg

            JOIN (SELECT em.reference_employee, tg.name, etg.test_group_id
                FROM test_group AS tg
                JOIN `employee-test_group` AS etg
                ON tg.id = etg.test_group_id
                JOIN employee AS em
                ON etg.employee_id = em.id
                WHERE etg.test_group_id
                IN (SELECT id
                    FROM test_group)) AS emp
            ON emp.test_group_id = tg.id

            JOIN (SELECT gp.test_group_id, prod.name, gp.has_product_passed_test, prod.id
                FROM test_group as tg
                JOIN `test-group_product` AS gp
                ON tg.id = gp.test_group_id
                JOIN product AS prod
                ON prod.id = gp.product_id
                WHERE gp.test_group_id
                IN (SELECT id
                    FROM test_group)
                AND gp.has_product_passed_test IS NOT NULL) AS prod
            ON prod.test_group_id = tg.id";

        $stmt = $conn->prepare($sql);
        return $stmt->executeQuery()->fetchAllAssociative();

        // returns an array of arrays (i.e. a raw data set)

    }
}
