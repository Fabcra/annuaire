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
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;

    /**
     * @var string
     *
     * 
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Bloc", inversedBy="Bloc")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $nom_bloc;

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


    /**
     * Set nomBloc
     *
     * @param \AppBundle\Entity\Bloc $nomBloc
     *
     * @return Position
     */
    public function setNomBloc(\AppBundle\Entity\Bloc $nomBloc = null)
    {
        $this->nom_bloc = $nomBloc;

        return $this;
    }

    /**
     * Get nomBloc
     *
     * @return \AppBundle\Entity\Bloc
     */
    public function getNomBloc()
    {
        return $this->nom_bloc;
    }
}
