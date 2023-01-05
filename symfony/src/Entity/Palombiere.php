<?php

namespace App\Entity;

use App\Repository\PalombiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PalombiereRepository::class)]
class Palombiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\OneToMany(mappedBy: 'MaPalombiere', targetEntity: User::class)]
    private Collection $chasseurs;

    #[ORM\ManyToOne(inversedBy: 'mesPalombieres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Departement $departement = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    public function __construct()
    {
        $this->chasseurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getChasseurs(): Collection
    {
        return $this->chasseurs;
    }

    public function addChasseur(User $chasseur): self
    {
        if (!$this->chasseurs->contains($chasseur)) {
            $this->chasseurs->add($chasseur);
            $chasseur->setMaPalombiere($this);
        }

        return $this;
    }

    public function removeChasseur(User $chasseur): self
    {
        if ($this->chasseurs->removeElement($chasseur)) {
            // set the owning side to null (unless already changed)
            if ($chasseur->getMaPalombiere() === $this) {
                $chasseur->setMaPalombiere(null);
            }
        }

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
