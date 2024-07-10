<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $day = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $openTimeAm = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $closeTimeAm = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $openTimePm = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $closeTimePm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function getOpenTimeAm(): ?\DateTimeInterface
    {
        return $this->openTimeAm;
    }

    public function setOpenTimeAm(\DateTimeInterface $openTimeAm): static
    {
        $this->openTimeAm = $openTimeAm;

        return $this;
    }

    public function getCloseTimeAm(): ?\DateTimeInterface
    {
        return $this->closeTimeAm;
    }

    public function setCloseTimeAm(\DateTimeInterface $closeTimeAm): static
    {
        $this->closeTimeAm = $closeTimeAm;

        return $this;
    }

    public function getOpenTimePm(): ?\DateTimeInterface
    {
        return $this->openTimePm;
    }

    public function setOpenTimePm(\DateTimeInterface $openTimePm): static
    {
        $this->openTimePm = $openTimePm;

        return $this;
    }

    public function getCloseTimePm(): ?\DateTimeInterface
    {
        return $this->closeTimePm;
    }

    public function setCloseTimePm(\DateTimeInterface $closeTimePm): static
    {
        $this->closeTimePm = $closeTimePm;

        return $this;
    }
}
