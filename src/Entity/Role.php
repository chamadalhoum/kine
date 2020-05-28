<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 */
class Role
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
    private $role_nom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $role_date_creation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $role_etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoleNom(): ?string
    {
        return $this->role_nom;
    }

    public function setRoleNom(?string $role_nom): self
    {
        $this->role_nom = $role_nom;

        return $this;
    }

    public function getRoleDateCreation(): ?\DateTimeInterface
    {
        return $this->role_date_creation;
    }

    public function setRoleDateCreation(?\DateTimeInterface $role_date_creation): self
    {
        $this->role_date_creation = $role_date_creation;

        return $this;
    }

    public function getRoleEtat(): ?string
    {
        return $this->role_etat;
    }

    public function setRoleEtat(?string $role_etat): self
    {
        $this->role_etat = $role_etat;

        return $this;
    }
}
