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
    private ?\DateTimeInterface $open_time_am = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $close_time_am = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $open_time_pm = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $close_time_pm = null;

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
        return $this->open_time_am;
    }

    public function setOpenTimeAm(\DateTimeInterface $open_time_am): static
    {
        $this->open_time_am = $open_time_am;

        return $this;
    }

    public function getCloseTimeAm(): ?\DateTimeInterface
    {
        return $this->close_time_am;
    }

    public function setCloseTimeAm(\DateTimeInterface $close_time_am): static
    {
        $this->close_time_am = $close_time_am;

        return $this;
    }

    public function getOpenTimePm(): ?\DateTimeInterface
    {
        return $this->open_time_pm;
    }

    public function setOpenTimePm(\DateTimeInterface $open_time_pm): static
    {
        $this->open_time_pm = $open_time_pm;

        return $this;
    }

    public function getCloseTimePm(): ?\DateTimeInterface
    {
        return $this->close_time_pm;
    }

    public function setCloseTimePm(\DateTimeInterface $close_time_pm): static
    {
        $this->close_time_pm = $close_time_pm;

        return $this;
    }
}
