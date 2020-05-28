<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CabinetRepository")
 */
class Cabinet
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
    private $centre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fixe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $portable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail_directeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $page_facebook;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCentre(): ?string
    {
        return $this->centre;
    }

    public function setCentre(string $centre): self
    {
        $this->centre = $centre;

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

    public function getFixe(): ?string
    {
        return $this->fixe;
    }

    public function setFixe(string $fixe): self
    {
        $this->fixe = $fixe;

        return $this;
    }

    public function getPortable(): ?string
    {
        return $this->portable;
    }

    public function setPortable(string $portable): self
    {
        $this->portable = $portable;

        return $this;
    }

    public function getMailDirecteur(): ?string
    {
        return $this->mail_directeur;
    }

    public function setMailDirecteur(string $mail_directeur): self
    {
        $this->mail_directeur = $mail_directeur;

        return $this;
    }

    public function getPageFacebook(): ?string
    {
        return $this->page_facebook;
    }

    public function setPageFacebook(string $page_facebook): self
    {
        $this->page_facebook = $page_facebook;

        return $this;
    }
}
