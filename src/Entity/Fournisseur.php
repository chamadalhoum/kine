<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FournisseurRepository")
 */
class Fournisseur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Produit", mappedBy="fournisseur", cascade={"persist", "remove"})
     */
    private $fournisseurs;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Article", mappedBy="fournisseur", cascade={"persist", "remove"})
     */
    private $fournisseur;
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getFournisseurs(): ?Produit
    {
        return $this->fournisseurs;
    }

    public function setFournisseurs(Produit $fournisseurs): self
    {
        $this->fournisseurs = $fournisseurs;

        // set the owning side of the relation if necessary
        if ($fournisseurs->getFournisseur() !== $this) {
            $fournisseurs->setFournisseur($this);
        }

        return $this;
    }
     /**
    * toString
    * @return string
    */
    public function __toString() 
{
    return  $this->nom; 
}

    public function getFournisseur(): ?Article
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Article $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        // set (or unset) the owning side of the relation if necessary
        $newFournisseur = null === $fournisseur ? null : $this;
        if ($fournisseur->getFournisseur() !== $newFournisseur) {
            $fournisseur->setFournisseur($newFournisseur);
        }

        return $this;
    }
}
