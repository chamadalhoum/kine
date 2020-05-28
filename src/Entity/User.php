<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields={"user_email"},
 * message="l'email que vous avez indiqué est déja utilisé !")
 */
class User implements UserInterface
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
    private $user_nom;
/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $username;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_password;
/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_adresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_sex;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $user_datenaissance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_cin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_matriculecnss;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employe", inversedBy="utilisateur")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="utilisateur")
     */
    private $UserPatient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserNom(): ?string
    {
        return $this->user_nom;
    }
    public function setUserNom(?string $user_nom): self
    {
        $this->user_nom = $user_nom;

        return $this;
    }
    public function getUsername(): ?string
    {
        return $this->username;
    }
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUserPrenom(): ?string
    {
        return $this->user_prenom;
    }

    public function setUserPrenom(?string $user_prenom): self
    {
        $this->user_prenom = $user_prenom;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(?string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(?string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getUserAdresse(): ?string
    {
        return $this->user_adresse;
    }

    public function setUserAdresse(?string $user_adresse): self
    {
        $this->user_adresse = $user_adresse;

        return $this;
    }

    public function getUserTel(): ?int
    {
        return $this->user_tel;
    }

    public function setUserTel(?int $user_tel): self
    {
        $this->user_tel = $user_tel;

        return $this;
    }

    public function getUserSex(): ?string
    {
        return $this->user_sex;
    }

    public function setUserSex(?string $user_sex): self
    {
        $this->user_sex = $user_sex;

        return $this;
    }

    public function getUserDatenaissance(): ?\DateTimeInterface
    {
        return $this->user_datenaissance;
    }

    public function setUserDatenaissance(?\DateTimeInterface $user_datenaissance): self
    {
        $this->user_datenaissance = $user_datenaissance;

        return $this;
    }

    public function getUserCin(): ?int
    {
        return $this->user_cin;
    }

    public function setUserCin(?int $user_cin): self
    {
        $this->user_cin = $user_cin;

        return $this;
    }

    public function getUserMatriculecnss(): ?string
    {
        return $this->user_matriculecnss;
    }

    public function setUserMatriculecnss(?string $user_matriculecnss): self
    {
        $this->user_matriculecnss = $user_matriculecnss;

        return $this;
    }

    public function getRoles(): array
    {
     $roles= $this->roles;
       $roles[]= 'ROLE_USER';
       return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

     return $this;
    }
    public function resetRoles()
    {
        $this->roles = [];
    }
    public function eraseCredentials(){}
    public function getSalt(){}

    public function getUser(): ?Employe
    {
        return $this->User;
    }

    public function setUser(?Employe $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getUserPatient(): ?Patient
    {
        return $this->UserPatient;
    }

    public function setUserPatient(?Patient $UserPatient): self
    {
        $this->UserPatient = $UserPatient;

        return $this;
    }
  

}
