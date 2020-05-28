<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrestationRepository")
 */
class Prestation
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
    private $nom_pathologie;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_min;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_max;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPathologie(): ?string
    {
        return $this->nom_pathologie;
    }

    public function setNomPathologie(?string $nom_pathologie): self
    {
        $this->nom_pathologie = $nom_pathologie;

        return $this;
    }

    public function getPrixMin(): ?float
    {
        return $this->prix_min;
    }

    public function setPrixMin(?float $prix_min): self
    {
        $this->prix_min = $prix_min;

        return $this;
    }

    public function getPrixMax(): ?float
    {
        return $this->prix_max;
    }

    public function setPrixMax(?float $prix_max): self
    {
        $this->prix_max = $prix_max;

        return $this;
    }
}
