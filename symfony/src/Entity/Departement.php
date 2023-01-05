<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartementRepository::class)]
class Departement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'departement', targetEntity: Palombiere::class)]
    private Collection $mesPalombieres;

    #[ORM\Column]
    private ?string $numero = null;

    public function __construct()
    {
        $this->mesPalombieres = new ArrayCollection();
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

    /**
     * @return Collection<int, Palombiere>
     */
    public function getMesPalombieres(): Collection
    {
        return $this->mesPalombieres;
    }

    public function addMesPalombiere(Palombiere $mesPalombiere): self
    {
        if (!$this->mesPalombieres->contains($mesPalombiere)) {
            $this->mesPalombieres->add($mesPalombiere);
            $mesPalombiere->setDepartement($this);
        }

        return $this;
    }

    public function removeMesPalombiere(Palombiere $mesPalombiere): self
    {
        if ($this->mesPalombieres->removeElement($mesPalombiere)) {
            // set the owning side to null (unless already changed)
            if ($mesPalombiere->getDepartement() === $this) {
                $mesPalombiere->setDepartement(null);
            }
        }

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }
}
