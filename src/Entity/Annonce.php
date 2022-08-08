<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce", indexes={@ORM\Index(name="ANNONCE_UTILISATEUR0_FK", columns={"ID_UTILISATEUR"}), @ORM\Index(name="ANNONCE_SOUS_CATEGORIE1_FK", columns={"ID_SOUS_CATEGORIE"}), @ORM\Index(name="ANNONCE_VILLE2_FK", columns={"ID_VILLE"}), @ORM\Index(name="ANNONCE_ETAT_OBJET_FK", columns={"ID_ETAT"})})
 * @ORM\Entity
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
    private $dateCreation;

    /**
     * @var \SousCategorie
     *
     * @ORM\ManyToOne(targetEntity="SousCategorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SOUS_CATEGORIE", referencedColumnName="ID_SOUS_CATEGORIE")
     * })
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
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_UTILISATEUR", referencedColumnName="ID_UTILISATEUR")
     * })
     */
    private $idUtilisateur;


}
