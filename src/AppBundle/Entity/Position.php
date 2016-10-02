<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Position
 *
 * @ORM\Table(name="position")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PositionRepository")
 */
class Position {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="Ordre", type="integer")
     */
    private $ordre;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     * 
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Bloc", mappedBy="Bloc")
     */
    private $nom;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return Position
     */
    public function setOrdre($ordre) {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return int
     */
    public function getOrdre() {
        return $this->ordre;
    }

}
