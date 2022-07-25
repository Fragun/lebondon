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
     * @ORM\Column(name="NOM_VILLE", type="string", length=100, nullable=false)
     */
    private $nomVille;

    /**
     * @var string
     *
     * @ORM\Column(name="CODE_POSTAL", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $codePostal;

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


}
