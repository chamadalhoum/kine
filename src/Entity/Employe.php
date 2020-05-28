<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeRepository")
 */
class Employe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sole_conge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $num_empl;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="User")
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rendezvous", inversedBy="employe")
     */
    private $employe;

    public function __construct()
    {
        $this->utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoleConge(): ?string
    {
        return $this->sole_conge;
    }

    public function setSoleConge(string $sole_conge): self
    {
        $this->sole_conge = $sole_conge;

        return $this;
    }

    public function getNumEmpl(): ?string
    {
        return $this->num_empl;
    }

    public function setNumEmpl(string $num_empl): self
    {
        $this->num_empl = $num_empl;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUtilisateur(): Collection
    {
        return $this->utilisateur;
    }

    public function addUtilisateur(User $utilisateur): self
    {
        if (!$this->utilisateur->contains($utilisateur)) {
            $this->utilisateur[] = $utilisateur;
            $utilisateur->setUser($this);
        }

        return $this;
    }

    public function removeUtilisateur(User $utilisateur): self
    {
        if ($this->utilisateur->contains($utilisateur)) {
            $this->utilisateur->removeElement($utilisateur);
            // set the owning side to null (unless already changed)
            if ($utilisateur->getUser() === $this) {
                $utilisateur->setUser(null);
            }
        }

        return $this;
    }

    public function getEmploye(): ?Rendezvous
    {
        return $this->employe;
    }

    public function setEmploye(?Rendezvous $employe): self
    {
        $this->employe = $employe;

        return $this;
    }
}
