<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EmployeeFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $employee = new Employee();

        $employee->setPassword($this->passwordHasher->hashPassword(
            $employee,
            'your_new_password'
        ));

        $manager->persist($employee);

        $manager->flush();
    }
}
