<?php

namespace App\Entity;

use App\Repository\FarmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FarmRepository::class)]
class Farm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $size = null;

    /**
     * @var Collection<int, Veterinarian>
     */
    #[ORM\ManyToMany(targetEntity: Veterinarian::class, inversedBy: 'farms')]
    private Collection $veterinarian;

    #[ORM\Column(length: 255)]
    private ?string $manager = null;

    /**
     * @var Collection<int, Cow>
     */
    #[ORM\OneToMany(targetEntity: Cow::class, mappedBy: 'farm', orphanRemoval: true)]
    private Collection $cows;

    public function __construct()
    {
        $this->veterinarian = new ArrayCollection();
        $this->cows = new ArrayCollection();
    }

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

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(float $size): static
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return Collection<int, Veterinarian>
     */
    public function getVeterinarian(): Collection
    {
        return $this->veterinarian;
    }

    public function addVeterinarian(Veterinarian $veterinarian): static
    {
        if (!$this->veterinarian->contains($veterinarian)) {
            $this->veterinarian->add($veterinarian);
        }

        return $this;
    }

    public function removeVeterinarian(Veterinarian $veterinarian): static
    {
        $this->veterinarian->removeElement($veterinarian);

        return $this;
    }

    public function getManager(): ?string
    {
        return $this->manager;
    }

    public function setManager(string $manager): static
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * @return Collection<int, Cow>
     */
    public function getCows(): Collection
    {
        return $this->cows;
    }

    public function addCow(Cow $cow): static
    {
        if (!$this->cows->contains($cow)) {
            $this->cows->add($cow);
            $cow->setFarm($this);
        }

        return $this;
    }

    public function removeCow(Cow $cow): static
    {
        if ($this->cows->removeElement($cow)) {
            // set the owning side to null (unless already changed)
            if ($cow->getFarm() === $this) {
                $cow->setFarm(null);
            }
        }

        return $this;
    }
}
