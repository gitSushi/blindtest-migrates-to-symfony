<?php

namespace App\Repository;

use App\Entity\Test;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TestDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Test::class);
    }

    public function getDetails(int $id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT test_group.id, test_group.`name`, test_group.last_date_tested, test_group.description, employee.reference_employee, `test-test_group`.is_test_passed, `test-test_group`.percentage,test.name AS testname, test.minimum_value, test.maximum_value 
        FROM test_group 
        JOIN `test-test_group` 
        ON test_group.id = test_group_id 
        JOIN `employee-test_group` 
        ON `employee-test_group`.test_group_id = test_group.id 
        JOIN employee ON `employee-test_group`.employee_id = employee.id 
        JOIN test ON `test-test_group`.test_id = test.id 
        WHERE test_group.id = $id;";

        $stmt = $conn->prepare($sql);
        return $stmt->executeQuery()->fetchAllAssociative();
    }
}
