<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $compagnant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero_fiche;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $assurance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_cnam;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="UserPatient")
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rendezvous", inversedBy="patient")
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Facture", inversedBy="patient")
     */
    private $Patientfacture;

    /**
     * @ORM\OneToOne(targetEntity=Dossiermedicale::class, mappedBy="patient", cascade={"persist", "remove"})
     */
    private $Patient;

    public function __construct()
    {
        $this->utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompagnant(): ?string
    {
        return $this->compagnant;
    }

    public function setCompagnant(?string $compagnant): self
    {
        $this->compagnant = $compagnant;

        return $this;
    }

    public function getNumeroFiche(): ?string
    {
        return $this->numero_fiche;
    }

    public function setNumeroFiche(?string $numero_fiche): self
    {
        $this->numero_fiche = $numero_fiche;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(?string $assurance): self
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getCodeCnam(): ?string
    {
        return $this->code_cnam;
    }

    public function setCodeCnam(?string $code_cnam): self
    {
        $this->code_cnam = $code_cnam;

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
            $utilisateur->setUserPatient($this);
        }

        return $this;
    }

    public function removeUtilisateur(User $utilisateur): self
    {
        if ($this->utilisateur->contains($utilisateur)) {
            $this->utilisateur->removeElement($utilisateur);
            // set the owning side to null (unless already changed)
            if ($utilisateur->getUserPatient() === $this) {
                $utilisateur->setUserPatient(null);
            }
        }

        return $this;
    }

    public function getPatient(): ?Rendezvous
    {
        return $this->patient;
    }

    public function setPatient(?Rendezvous $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getPatientfacture(): ?Facture
    {
        return $this->Patientfacture;
    }

    public function setPatientfacture(?Facture $Patientfacture): self
    {
        $this->Patientfacture = $Patientfacture;

        return $this;
    }
}
