<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDangerous;

    /**
     * @ORM\ManyToOne(targetEntity=Family::class, inversedBy="animals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $family;

    /**
     * @ORM\ManyToMany(targetEntity=Continent::class, mappedBy="animals")
     */
    private $continents;

    /**
     * @ORM\OneToMany(targetEntity=HaveAnimal::class, mappedBy="animal")
     */
    private $haveAnimals;

    public function __construct()
    {
        $this->continents = new ArrayCollection();
        $this->haveAnimals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getIsDangerous(): ?bool
    {
        return $this->isDangerous;
    }

    public function setIsDangerous(bool $isDangerous): self
    {
        $this->isDangerous = $isDangerous;

        return $this;
    }

    public function getFamily(): ?Family
    {
        return $this->family;
    }

    public function setFamily(?Family $family): self
    {
        $this->family = $family;

        return $this;
    }

    /**
     * @return Collection|Continent[]
     */
    public function getContinents(): Collection
    {
        return $this->continents;
    }

    public function addContinent(Continent $continent): self
    {
        if (!$this->continents->contains($continent)) {
            $this->continents[] = $continent;
            $continent->addAnimal($this);
        }

        return $this;
    }

    public function removeContinent(Continent $continent): self
    {
        if ($this->continents->removeElement($continent)) {
            $continent->removeAnimal($this);
        }

        return $this;
    }

    /**
     * @return Collection|HaveAnimal[]
     */
    public function getHaveAnimals(): Collection
    {
        return $this->haveAnimals;
    }

    public function addHaveAnimal(HaveAnimal $haveAnimal): self
    {
        if (!$this->haveAnimals->contains($haveAnimal)) {
            $this->haveAnimals[] = $haveAnimal;
            $haveAnimal->setAnimal($this);
        }

        return $this;
    }

    public function removeHaveAnimal(HaveAnimal $haveAnimal): self
    {
        if ($this->haveAnimals->removeElement($haveAnimal)) {
            // set the owning side to null (unless already changed)
            if ($haveAnimal->getAnimal() === $this) {
                $haveAnimal->setAnimal(null);
            }
        }

        return $this;
    }
}
