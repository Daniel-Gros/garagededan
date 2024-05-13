<?php

namespace App\Entity;

use App\Repository\DinPowerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DinPowerRepository::class)]
class DinPower
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $number_of_din_hp = null;

    /**
     * @var Collection<int, Car>
     */
    #[ORM\OneToMany(targetEntity: Car::class, mappedBy: 'din_power', orphanRemoval: true)]
    private Collection $cars;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->number_of_din_hp . ' ch DIN';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOfDinHp(): ?int
    {
        return $this->number_of_din_hp;
    }

    public function setNumberOfDinHp(int $number_of_din_hp): static
    {
        $this->number_of_din_hp = $number_of_din_hp;

        return $this;
    }

    /**
     * @return Collection<int, Car>
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): static
    {
        if (!$this->cars->contains($car)) {
            $this->cars->add($car);
            $car->setDinPower($this);
        }

        return $this;
    }

    public function removeCar(Car $car): static
    {
        if ($this->cars->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getDinPower() === $this) {
                $car->setDinPower(null);
            }
        }

        return $this;
    }
}
