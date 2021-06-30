<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="serial_number", type="string", length=8, nullable=true)
     */
    private $serialNumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TestGroup", mappedBy="product")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(?string $serialNumber): self
    {
        $this->serialNumber = $serialNumber;

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
            $testGroup->addProduct($this);
        }

        return $this;
    }

    public function removeTestGroup(TestGroup $testGroup): self
    {
        if ($this->testGroup->removeElement($testGroup)) {
            $testGroup->removeProduct($this);
        }

        return $this;
    }

}
