<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtatObjet
 *
 * @ORM\Table(name="etat_objet")
 * @ORM\Entity
 */
class EtatObjet
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_ETAT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEtat;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_ETAT", type="string", length=20, nullable=false)
     */
    private $nomEtat;


}
