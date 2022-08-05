<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DisponibiliteObjet
 *
 * @ORM\Table(name="disponibilite_objet")
 * @ORM\Entity
 */
class DisponibiliteObjet
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_DISPONIBILITE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDisponibilite;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_DISPONIBILITE", type="string", length=15, nullable=false)
     */
    private $nomDisponibilite;


}
