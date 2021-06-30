<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity
 */
class Test
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
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="minimum_value", type="integer", nullable=true)
     */
    private $minimumValue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="maximum_value", type="integer", nullable=true)
     */
    private $maximumValue;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TestGroup", mappedBy="test")
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMinimumValue(): ?int
    {
        return $this->minimumValue;
    }

    public function setMinimumValue(?int $minimumValue): self
    {
        $this->minimumValue = $minimumValue;

        return $this;
    }

    public function getMaximumValue(): ?int
    {
        return $this->maximumValue;
    }

    public function setMaximumValue(?int $maximumValue): self
    {
        $this->maximumValue = $maximumValue;

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
            $testGroup->addTest($this);
        }

        return $this;
    }

    public function removeTestGroup(TestGroup $testGroup): self
    {
        if ($this->testGroup->removeElement($testGroup)) {
            $testGroup->removeTest($this);
        }

        return $this;
    }

}
