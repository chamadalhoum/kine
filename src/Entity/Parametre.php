<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParametreRepository")
 */
class Parametre
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
    private $parametre_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parametre_valeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParametreNom(): ?string
    {
        return $this->parametre_nom;
    }

    public function setParametreNom(?string $parametre_nom): self
    {
        $this->parametre_nom = $parametre_nom;

        return $this;
    }

    public function getParametreValeur(): ?string
    {
        return $this->parametre_valeur;
    }

    public function setParametreValeur(string $parametre_valeur): self
    {
        $this->parametre_valeur = $parametre_valeur;

        return $this;
    }
}
