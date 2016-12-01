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
     *
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Utilisateur", mappedBy="position")
     */
    private $utilisateurs;
    
    
    /**
     *
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Bloc", mappedBy="position")
     */
    private $blocs;

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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->blocs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Position
     */
    public function addUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     */
    public function removeUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Add bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return Position
     */
    public function addBloc(\AppBundle\Entity\Bloc $bloc)
    {
        $this->blocs[] = $bloc;

        return $this;
    }

    /**
     * Remove bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     */
    public function removeBloc(\AppBundle\Entity\Bloc $bloc)
    {
        $this->blocs->removeElement($bloc);
    }

    /**
     * Get blocs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlocs()
    {
        return $this->blocs;
    }
}
