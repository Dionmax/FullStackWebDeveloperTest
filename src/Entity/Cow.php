<?php

namespace App\Entity;

use App\Repository\CowRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CowRepository::class)]
class Cow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $milkProduction = null;

    #[ORM\Column]
    private ?float $weeklyFeed = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birth = null;

    #[ORM\ManyToOne(inversedBy: 'cows')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Farm $farm = null;

    #[ORM\Column]
    private ?bool $Slaughtered = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMilkProduction(): ?float
    {
        return $this->milkProduction;
    }

    public function setMilkProduction(float $milkProduction): static
    {
        $this->milkProduction = $milkProduction;

        return $this;
    }

    public function getWeeklyFeed(): ?float
    {
        return $this->weeklyFeed;
    }

    public function setWeeklyFeed(float $weeklyFeed): static
    {
        $this->weeklyFeed = $weeklyFeed;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getBirth(): ?\DateTimeInterface
    {
        return $this->birth;
    }

    public function setBirth(\DateTimeInterface $birth): static
    {
        $this->birth = $birth;

        return $this;
    }

    public function getFarm(): ?Farm
    {
        return $this->farm;
    }

    public function setFarm(?Farm $farm): static
    {
        $this->farm = $farm;

        return $this;
    }

    public function isSlaughtered(): ?bool
    {
        return $this->Slaughtered;
    }

    public function setSlaughtered(bool $Slaughtered): static
    {
        $this->Slaughtered = $Slaughtered;

        return $this;
    }
}
