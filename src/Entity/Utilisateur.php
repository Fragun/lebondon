<?php

namespace App\Entity;

<<<<<<< Updated upstream
=======

use App\Entity\Utilisateur;
>>>>>>> Stashed changes
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

    /**
     * @var string
     *
     * @ORM\Column(name="RESET_TOKEN", type="string", length=50, nullable=false)
     */
    private $resetToken;






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

    public function setPasswordHasherName(): ?string
    {
        return null;
    }

    public function getPasswordHasherName(): ?string
    {
        return null;
    }
    public function __toString()
    {
        return $this->idUtilisateur;
    }




    
    

    /**
     * Get the value of idUtilisateur
     *
     * @return  int
     */ 
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     *
     * @param  int  $idUtilisateur
     *
     * @return  self
     */ 
    public function setIdUtilisateur(int $idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get the value of pseudoUtilisateur
     *
     * @return  string
     */ 
    public function getPseudoUtilisateur()
    {
        return $this->pseudoUtilisateur;
    }

    /**
     * Set the value of pseudoUtilisateur
     *
     * @param  string  $pseudoUtilisateur
     *
     * @return  self
     */ 
    public function setPseudoUtilisateur(string $pseudoUtilisateur)
    {
        $this->pseudoUtilisateur = $pseudoUtilisateur;

        return $this;
    }

    /**
     * Get the value of nomUtilisateur
     *
     * @return  string
     */ 
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * Set the value of nomUtilisateur
     *
     * @param  string  $nomUtilisateur
     *
     * @return  self
     */ 
    public function setNomUtilisateur(string $nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     *
     * @return  DateTime|null
     */ 
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @param  DateTime|null  $dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of genre
     *
     * @return  string|null
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @param  string|null  $genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of photoUtilisateur
     *
     * @return  string|null
     */ 
    public function getPhotoUtilisateur()
    {
        return $this->photoUtilisateur;
    }

    /**
     * Set the value of photoUtilisateur
     *
     * @param  string|null  $photoUtilisateur
     *
     * @return  self
     */ 
    public function setPhotoUtilisateur($photoUtilisateur)
    {
        $this->photoUtilisateur = $photoUtilisateur;

        return $this;
    }

    /**
     * Get the value of mdpUtilisateur
     *
     * @return  string
     */ 
    public function getMdpUtilisateur()
    {
        return $this->mdpUtilisateur;
    }

    /**
     * Set the value of mdpUtilisateur
     *
     * @param  string  $mdpUtilisateur
     *
     * @return  self
     */ 
    public function setMdpUtilisateur(string $mdpUtilisateur)
    {
        $this->mdpUtilisateur = $mdpUtilisateur;

        return $this;
    }

    /**
     * Get the value of mailUtilisateur
     *
     * @return  string
     */ 
    public function getMailUtilisateur()
    {
        return $this->mailUtilisateur;
    }

<<<<<<< Updated upstream
    public function setMailUtilisateur(string $mailUtilisateur): self
=======
    /**
     * Set the value of mailUtilisateur
     *
     * @param  string  $mailUtilisateur
     *
     * @return  self
     */ 
    public function setMailUtilisateur(string $mailUtilisateur)
>>>>>>> Stashed changes
    {
        $this->mailUtilisateur = $mailUtilisateur;

        return $this;
    }

<<<<<<< Updated upstream
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

   public function setPasswordHasherName(): ?string
   {
       return null;
   }

   public function getPasswordHasherName(): ?string
   {
       return null;
   }
   public function __toString()
   {
       return $this->idUtilisateur;
   }

   public function getIsVerified(): ?bool
    {
        return $this->is_verified;
    }

    public function setIsVerified(bool $is_verified): self
    {
        $this->is_verified = $is_verified;

        return $this;
    }

    public function getResetToken(): ?string
=======

    /**
     * Get the value of resetToken
     *
     * @return  string
     */ 
    public function getResetToken()
>>>>>>> Stashed changes
    {
        return $this->resetToken;
    }

    /**
     * Set the value of resetToken
     *
     * @param  string  $resetToken
     *
     * @return  self
     */ 
    public function setResetToken(string $resetToken)
    {
        $this->resetToken = $resetToken;

        return $this;
    }
}
