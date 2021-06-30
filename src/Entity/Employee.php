<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=100, nullable=true)
     */
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastname", type="string", length=100, nullable=true)
     */
    private $lastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference_employee", type="string", length=8, nullable=true)
     */
    private $referenceEmployee;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TestGroup", inversedBy="employee")
     * @ORM\JoinTable(name="employee-test_group",
     *   joinColumns={
     *     @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="test_group_id", referencedColumnName="id")
     *   }
     * )
     */
    private $testGroup;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->testGroup = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getReferenceEmployee(): ?string
    {
        return $this->referenceEmployee;
    }

    public function setReferenceEmployee(?string $referenceEmployee): self
    {
        $this->referenceEmployee = $referenceEmployee;

        return $this;
    }

    /**
     * @return Collection|TestGroup[]
     */
    public function getTestGroup(): Collection
    {
        return $this->testGroup;
    }

    public function addTestGroup(TestGroup $testGroup): self
    {
        if (!$this->testGroup->contains($testGroup)) {
            $this->testGroup[] = $testGroup;
        }

        return $this;
    }

    public function removeTestGroup(TestGroup $testGroup): self
    {
        $this->testGroup->removeElement($testGroup);

        return $this;
    }

}
