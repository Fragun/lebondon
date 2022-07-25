<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SousCategorie
 *
 * @ORM\Table(name="sous_categorie", indexes={@ORM\Index(name="SOUS_CATEGORIE_CATEGORIE_FK", columns={"ID_CATEGORIE"})})
 * @ORM\Entity(repositoryClass= "App\Repository\SousCategorieRepository")
 */
class SousCategorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_SOUS_CATEGORIE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSousCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_SOUS_CATEGORIE", type="string", length=100, nullable=false)
     */
    private $nomSousCategorie;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CATEGORIE", referencedColumnName="ID_CATEGORIE")
     * })
     */
    private $idCategorie;

    public function getIdSousCategorie(): ?int
    {
        return $this->idSousCategorie;
    }

    public function getNomSousCategorie(): ?string
    {
        return $this->nomSousCategorie;
    }

    public function setNomSousCategorie(string $nomSousCategorie): self
    {
        $this->nomSousCategorie = $nomSousCategorie;

        return $this;
    }

    public function getIdCategorie(): ?Categorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?Categorie $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }


}
