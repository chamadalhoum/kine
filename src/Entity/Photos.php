<?php

namespace App\Entity;

use App\Repository\PhotosRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Dossiermedicale;
/**
 * @ORM\Entity(repositoryClass=PhotosRepository::class)
 */
class Photos
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
    private $name;
/**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dossiermedicale", inversedBy="Photos", cascade={"persist", "remove"})
     * * @ORM\JoinColumn(nullable=false)
     */
    private $dossiermedicale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

      /**
    * toString
    * @return string
    */
    public function __toString() 
{
    return  $this->name; 
}

    public function getDossiermedicale(): ?Dossiermedicale
    {
        return $this->dossiermedicale;
    }

    public function setDossiermedicale(?Dossiermedicale $dossiermedicale): self
    {
        $this->dossiermedicale = $dossiermedicale;


        return $this;
    }
}
