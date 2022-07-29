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
 * @ORM\Table(name="annonce", indexes={@ORM\Index(name="ANNONCE_SOUS_CATEGORIE1_FK", columns={"ID_SOUS_CATEGORIE"}), @ORM\Index(name="ANNONCE_VILLE2_FK", columns={"ID_VILLE"}), @ORM\Index(name="ANNONCE_ETAT_OBJET_FK", columns={"ID_ETAT"}), @ORM\Index(name="ANNONCE_UTILISATEUR0_FK", columns={"ID_UTILISATEUR"})})
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
     * @ORM\Column(name="slug_a", type="string", length=150, nullable=false)
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
     * @ORM\Column(name="DATE_CREATION_ANNONCE", type="datetime", nullable=false)
     */
    private $dateCreationAnnonce;

    /**
     * @var \Doctrine\Common\Collections\Collection
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
     * @ORM\ManyToOne(targetEntity="EtatObjet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ETAT", referencedColumnName="ID_ETAT")
     * })
     */
    private $idEtat;

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
     * Constructor
     */
    public function __construct()
    {
        $this->idSousCategorie = new ArrayCollection();
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

    public function getDateCreationAnnonce(): ?\DateTimeInterface
    {
        return $this->dateCreationAnnonce;
    }

    public function setDateCreationAnnonce(\DateTimeInterface $dateCreationAnnonce): self
    {
        $this->dateCreationAnnonce = $dateCreationAnnonce;

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

    public function getIdEtat(): ?EtatObjet
    {
        return $this->idEtat;
    }

    public function setIdEtat(?EtatObjet $idEtat): self
    {
        $this->idEtat = $idEtat;

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
