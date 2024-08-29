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
    private ?float $mil�kProduction = null;

    #[ORM\Column]
    private ?float $weeklyFeed = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birth = null;

    #[ORM\ManyToOne(inversedBy: 'cows')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Farm $farm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMil�kProduction(): ?float
    {
        return $this->mil�kProduction;
    }

    public function setMil�kProduction(float $mil�kProduction): static
    {
        $this->mil�kProduction = $mil�kProduction;

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
}
