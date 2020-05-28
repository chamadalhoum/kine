<?php

namespace App\Entity;

use App\Repository\SuiviRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuiviRepository::class)
 */
class Suivi
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
    private $suivi;

    /**
     * @ORM\OneToOne(targetEntity=Dossiermedicale::class, cascade={"persist", "remove"})
     */
    private $dossiermedical;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuivi(): ?string
    {
        return $this->suivi;
    }

    public function setSuivi(string $suivi): self
    {
        $this->suivi = $suivi;

        return $this;
    }

    public function getDossiermedical(): ?Dossiermedicale
    {
        return $this->dossiermedical;
    }

    public function setDossiermedical(?Dossiermedicale $dossiermedical): self
    {
        $this->dossiermedical = $dossiermedical;

        return $this;
    }
}
