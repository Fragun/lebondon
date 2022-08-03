<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville", indexes={@ORM\Index(name="VILLE_DEPARTEMENT_FK", columns={"ID_DEPARTEMENT"})})
 * @ORM\Entity(repositoryClass= "App\Repository\VilleRepository")
 */
class Ville
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_VILLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVille;

    /**
     * @var string
     *
     * @ORM\Column(name="CODE_POSTAL", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_VILLE", type="string", length=100, nullable=false)
     */
    private $nomVille;

    /**
     * @var string
     *
     * @ORM\Column(name="SLUG_VILLE", type="string", length=150, nullable=false)
     */
    private $slugVille;

        /**
     * @var string
     *
     * @ORM\Column(name="LATITUDE", type="decimal", nullable=false)
     */
    private $latitude;

        /**
     * @var string
     *
     * @ORM\Column(name="LONGITUDE", type="decimal", nullable=false)
     */
    private $longitude;



    /**
     * @var \Departement
     *
     * @ORM\ManyToOne(targetEntity="Departement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_DEPARTEMENT", referencedColumnName="ID_DEPARTEMENT")
     * })
     */
    private $idDepartement;

    public function getIdVille(): ?int
    {
        return $this->idVille;
    }

    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setNomVille(string $nomVille): self
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getIdDepartement(): ?Departement
    {
        return $this->idDepartement;
    }

    public function setIdDepartement(?Departement $idDepartement): self
    {
        $this->idDepartement = $idDepartement;

        return $this;
    }



    /**
     * Get the value of slugVille
     *
     * @return  string
     */ 
    public function getSlugVille()
    {
        return $this->slugVille;
    }

    /**
     * Set the value of slugVille
     *
     * @param  string  $slugVille
     *
     * @return  self
     */ 
    public function setSlugVille(string $slugVille)
    {
        $this->slugVille = $slugVille;

        return $this;
    }

    /**
     * Get the value of latitude
     *
     * @return  string
     */ 
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set the value of latitude
     *
     * @param  string  $latitude
     *
     * @return  self
     */ 
    public function setLatitude(string $latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get the value of longitude
     *
     * @return  string
     */ 
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set the value of longitude
     *
     * @param  string  $longitude
     *
     * @return  self
     */ 
    public function setLongitude(string $longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }
}
