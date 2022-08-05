<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", uniqueConstraints={@ORM\UniqueConstraint(name="RESERVATION_EVALUATION_AK", columns={"ID_EVALUATION"})}, indexes={@ORM\Index(name="RESERVATION_UTILISATEUR2_FK", columns={"ID_UTILISATEUR"}), @ORM\Index(name="RESERVATION_DISPONIBILITE_OBJET_FK", columns={"ID_DISPONIBILITE"}), @ORM\Index(name="RESERVATION_ANNONCE1_FK", columns={"ID_ANNONCE"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_RESERVATION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_RESERVATION", type="date", nullable=false)
     */
    private $dateReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_ENLEVEMENT", type="date", nullable=false)
     */
    private $dateEnlevement;

    /**
     * @var \DisponibiliteObjet
     *
     * @ORM\ManyToOne(targetEntity="DisponibiliteObjet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_DISPONIBILITE", referencedColumnName="ID_DISPONIBILITE")
     * })
     */
    private $idDisponibilite;

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
     * @var \Annonce
     *
     * @ORM\ManyToOne(targetEntity="Annonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ANNONCE", referencedColumnName="ID_ANNONCE")
     * })
     */
    private $idAnnonce;

    /**
     * @var \Evaluation
     *
     * @ORM\ManyToOne(targetEntity="Evaluation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_EVALUATION", referencedColumnName="ID_EVALUATION")
     * })
     */
    private $idEvaluation;


}
