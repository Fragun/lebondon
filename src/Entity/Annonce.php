<?php

namespace App\Entity;

use App\Entity\SousCategorie;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce", indexes={@ORM\Index(name="ANNONCE_VILLE2_FK", columns={"ID_VILLE"}), @ORM\Index(name="ANNONCE_ETAT_OBJET_FK", columns={"ID_ETAT"}), @ORM\Index(name="ANNONCE_UTILISATEUR0_FK", columns={"ID_UTILISATEUR"}), @ORM\Index(name="ANNONCE_SOUS_CATEGORIE1_FK", columns={"ID_SOUS_CATEGORIE"})})
 * @ORM\Entity(repositoryClass= "App\Repository\AnnonceRepository")
 */
class Annonce
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_ANNONCE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="TITRE_ANNONCE", type="string", length=150, nullable=false)
     */
    private $titreAnnonce;

        /**
     * @var string
     *
     * @ORM\Column(name="SLUG_ANNONCE", type="string", length=150, nullable=false)
     */
    private $slugAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTION_ANNONCE", type="string", length=1500, nullable=false)
     */
    private $descriptionAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSE", type="string", length=150, nullable=false)
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_CREATION", type="datetime", nullable=false)
     */
    private $dateCreation;

    /**

     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_UTILISATEUR", referencedColumnName="ID_UTILISATEUR")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \SousCategorie

     *
     * @ORM\ManyToMany(targetEntity="SousCategorie", mappedBy="idAnnonce")
     */
    private $idSousCategorie;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_VILLE", referencedColumnName="ID_VILLE")
     * })
     */
    private $idVille;

    /**
     * @var \EtatObjet

     *
     * @ORM\ManyToMany(targetEntity="EtatObjet", mappedBy="idAnnonce")
     */
    private $idEtat;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idSousCategorie = new ArrayCollection();
        $this->idEtat = new ArrayCollection(); 
    }

    public function getIdAnnonce(): ?int
    {
        return $this->idAnnonce;
    }

    public function getTitreAnnonce(): ?string
    {
        return $this->titreAnnonce;
    }

    public function setTitreAnnonce(string $titreAnnonce): self
    {
        $this->titreAnnonce = $titreAnnonce;

        return $this;
    }

    public function getSlugAnnonce(): ?string
    {
        return $this->slugAnnonce;
    }

    public function setSlugAnnonce(string $slugAnnonce): self
    {
        $this->slugAnnonce = $slugAnnonce;

        return $this;
    }

    public function getDescriptionAnnonce(): ?string
    {
        return $this->descriptionAnnonce;
    }

    public function setDescriptionAnnonce(string $descriptionAnnonce): self
    {
        $this->descriptionAnnonce = $descriptionAnnonce;

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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getIdVille(): ?Ville
    {
        return $this->idVille;
    }

    public function setIdVille(?Ville $idVille): self
    {
        $this->idVille = $idVille;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

         /**
     * @return Collection<int, EtatObjet>
     */
    public function getIdEtat(): Collection
    {
        return $this->idEtat;
    }

     /**
     * @return Collection<int, Categorie>
     */
    public function getIdSousCategorie(): Collection
    {
        return $this->idSousCategorie;
    }

    public function addIdCategorie(SousCategorie $idSousCategorie): self
    {
        if (!$this->idSousCategorie->contains($idSousCategorie)) {
            $this->idSousCategorie[] = $idSousCategorie;
            $idSousCategorie->addIdAnnonce($this);
        }

        return $this;
    }

    public function removeIdSsousCategorie(SousCategorie $idSousCategorie): self
    {
        if ($this->idSousCategorie->removeElement($idSousCategorie)) {
            $idSousCategorie->removeIdAnnonce($this);
        }

        return $this;
    }


}
