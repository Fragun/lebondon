<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherAwareInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass= "App\Repository\UtilisateurRepository")
 */
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface, PasswordHasherAwareInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_UTILISATEUR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="PSEUDO_UTILISATEUR", type="string", length=20, nullable=false)
     */
    private $pseudoUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_UTILISATEUR", type="string", length=100, nullable=false)
     */
    private $nomUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="PRENOM_UTILISATEUR", type="string", length=100, nullable=false)
     */
    private $prenomUtilisateur;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_NAISSANCE", type="date", nullable=true, options={"default"="NULL"})
     */
    private $dateNaissance = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="GENRE", type="string", length=1, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $genre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PHOTO_UTILISATEUR", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $photoUtilisateur = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="MDP_UTILISATEUR", type="string", length=50, nullable=false)
     */
    private $mdpUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="MAIL_UTILISATEUR", type="string", length=50, nullable=false)
     */
    private $mailUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="ROLE_UTILISATEUR", type="string", length=50, nullable=false)
     */
    private $roleUtilisateur;

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getPseudoUtilisateur(): ?string
    {
        return $this->pseudoUtilisateur;
    }

    public function setPseudoUtilisateur(string $pseudoUtilisateur): self
    {
        $this->pseudoUtilisateur = $pseudoUtilisateur;

        return $this;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(string $nomUtilisateur): self
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur(string $prenomUtilisateur): self
    {
        $this->prenomUtilisateur = $prenomUtilisateur;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getPhotoUtilisateur(): ?string
    {
        return $this->photoUtilisateur;
    }

    public function setPhotoUtilisateur(?string $photoUtilisateur): self
    {
        $this->photoUtilisateur = $photoUtilisateur;

        return $this;
    }

    public function getMdpUtilisateur(): ?string
    {
        return $this->mdpUtilisateur;
    }

    public function setMdpUtilisateur(string $mdpUtilisateur): self
    {
        $this->mdpUtilisateur = $mdpUtilisateur;

        return $this;
    }

    public function getMailUtilisateur(): ?string
    {
        return $this->mailUtilisateur;
    }

    public function setMailUtilisateur(string $mailUtilisateur): self
    {
        $this->mailUtilisateur = $mailUtilisateur;

        return $this;
    }

    public function getRoleUtilisateur(): ?string
    {
        return $this->roleUtilisateur;
    }

    public function setRoleUtilisateur(string $roleUtilisateur): self
    {
        $this->roleUtilisateur = $roleUtilisateur;

        return $this;
    }

    /* The public representation of the user (e.g. a username, an email address, etc.)
    *
    * @see UserInterface
    */
   public function getUserIdentifier(): string
   {
       return (string) $this->mailUtilisateur;
   }

   /* @see UserInterface
    */
   public function getRoles(): array
   {
       $roles[] = $this->roleUtilisateur;
       return array_unique($roles);
   }

   /*
    * @see UserInterface
    */
   public function getSalt(): ?string
   {
       return null;
   }

   /* @see UserInterface
    */
   public function eraseCredentials()
   {
   }

   /**
    * @see PasswordAuthenticatedUserInterface
    */
   public function getPassword(): string
   {
       return $this->mdpUtilisateur;
   }

   public function getPasswordHasherName(): ?string
   {
       return null;
   }
   public function __toString()
   {
       return $this->idUtilisateur;
   }

}
