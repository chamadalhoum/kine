<?php

namespace App\Entity;

use App\Repository\DossiermedicaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DossiermedicaleRepository::class)
 */
class Dossiermedicale
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
    private $medicaux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chirurgie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allergie;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Document", inversedBy="Document", cascade={"persist", "remove"})
     */
    private $document;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Analyse", inversedBy="Analyse", cascade={"persist", "remove"})
     */
    private $analyse;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $radio;

    /**
     * @ORM\OneToOne(targetEntity=Patient::class, inversedBy="Patient", cascade={"persist", "remove"})
     */
    private $patient;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photos", mappedBy="Photos", cascade={"persist", "remove"})
     */
    private $photos;
    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicaux(): ?string
    {
        return $this->medicaux;
    }

    public function setMedicaux(string $medicaux): self
    {
        $this->medicaux = $medicaux;

        return $this;
    }

    public function getChirurgie(): ?string
    {
        return $this->chirurgie;
    }

    public function setChirurgie(string $chirurgie): self
    {
        $this->chirurgie = $chirurgie;

        return $this;
    }

    public function getAllergie(): ?string
    {
        return $this->allergie;
    }

    public function setAllergie(string $allergie): self
    {
        $this->allergie = $allergie;

        return $this;
    }

    public function getDocument(): ?Document{
        return $this->document;
    }

    public function setDocument(Document $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getAnalyse(): ?Analyse
    {
        return $this->analyse;
    }

    public function setAnalyse(Analyse $analyse): self
    {
        $this->analyse = $analyse;

        return $this;
    }

    public function getRadio(): ?string
    {
        return $this->radio;
    }

    public function setRadio(string $radio): self
    {
        $this->radio = $radio;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getPhotos(): Collection
    {
        return $this->photos;
    }

 
    public function addImage(Photos $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setDossiermedicale($this);
        }

        return $this;
    }

    public function removeImage(Photos $photo): self
    {
        if ($this->photos->contains($photo)) {
            $this->photos->removeElement($photo);
            // set the owning side to null (unless already changed)
            if ($photo->getDossiermedicale() === $this) {
                $photo->setDossiermedicale(null);
            }
        }

        return $this;
    }
  

}
