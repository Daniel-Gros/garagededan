<?php

namespace App\Entity;

use App\Repository\EnergyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnergyRepository::class)]
class Energy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'energy', cascade: ['persist', 'remove'])]
    private ?Car $car = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(Car $car): static
    {
        // set the owning side of the relation if necessary
        if ($car->getEnergy() !== $this) {
            $car->setEnergy($this);
        }

        $this->car = $car;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
