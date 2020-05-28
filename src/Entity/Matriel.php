<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatrielRepository")
 */
class Matriel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $flaot;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_ttc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?float
    {
        return $this->nom;
    }

    public function setNom(?float $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getFlaot(): ?string
    {
        return $this->flaot;
    }

    public function setFlaot(string $flaot): self
    {
        $this->flaot = $flaot;

        return $this;
    }

    public function getPrixTtc(): ?float
    {
        return $this->prix_ttc;
    }

    public function setPrixTtc(?float $prix_ttc): self
    {
        $this->prix_ttc = $prix_ttc;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
