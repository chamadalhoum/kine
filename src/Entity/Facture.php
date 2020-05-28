<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
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
    private $num_fac;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant_paye;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant_reste;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_seance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_patologie;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Patient", mappedBy="Patientfacture")
     */
    private $patient;

    public function __construct()
    {
        $this->patient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumFac(): ?string
    {
        return $this->num_fac;
    }

    public function setNumFac(?string $num_fac): self
    {
        $this->num_fac = $num_fac;

        return $this;
    }

    public function getMontantPaye(): ?float
    {
        return $this->montant_paye;
    }

    public function setMontantPaye(?float $montant_paye): self
    {
        $this->montant_paye = $montant_paye;

        return $this;
    }

    public function getMontantReste(): ?float
    {
        return $this->montant_reste;
    }

    public function setMontantReste(?float $montant_reste): self
    {
        $this->montant_reste = $montant_reste;

        return $this;
    }

    public function getNbSeance(): ?int
    {
        return $this->nb_seance;
    }

    public function setNbSeance(?int $nb_seance): self
    {
        $this->nb_seance = $nb_seance;

        return $this;
    }

    public function getNomPatologie(): ?string
    {
        return $this->nom_patologie;
    }

    public function setNomPatologie(string $nom_patologie): self
    {
        $this->nom_patologie = $nom_patologie;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection|Patient[]
     */
    public function getPatient(): Collection
    {
        return $this->patient;
    }

    public function addPatient(Patient $patient): self
    {
        if (!$this->patient->contains($patient)) {
            $this->patient[] = $patient;
            $patient->setPatientfacture($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): self
    {
        if ($this->patient->contains($patient)) {
            $this->patient->removeElement($patient);
            // set the owning side to null (unless already changed)
            if ($patient->getPatientfacture() === $this) {
                $patient->setPatientfacture(null);
            }
        }

        return $this;
    }
}
