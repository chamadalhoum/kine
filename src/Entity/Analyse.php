<?php

namespace App\Entity;

use App\Repository\AnalyseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnalyseRepository::class)
 */
class Analyse
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
    private $analyse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnalyse(): ?string
    {
        return $this->analyse;
    }

    public function setAnalyse(?string $analyse): self
    {
        $this->analyse = $analyse;

        return $this;
    }
}
