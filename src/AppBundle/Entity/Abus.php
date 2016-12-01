<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abus
 *
 * @ORM\Table(name="abus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbusRepository")
 */
class Abus {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="encodage", type="datetime")
     */
    private $encodage;

    /**
     *
     * @var type
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="abus")
     *  
     */
    private $utilisateur;
    
    
    /**
     *
     * @var type 
     * 
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Commentaire", inversedBy="abus")
     */
    private $commentaires;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Abus
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set encodage
     *
     * @param \DateTime $encodage
     *
     * @return Abus
     */
    public function setEncodage($encodage) {
        $this->encodage = $encodage;

        return $this;
    }

    /**
     * Get encodage
     *
     * @return \DateTime
     */
    public function getEncodage() {
        return $this->encodage;
    }

    function getUtilisateur() {
        return $this->utilisateur;
    }

    function setUtilisateur(type $utilisateur) {
        $this->utilisateur = $utilisateur;
    }

    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add commentaire
     *
     * @param \AppBundle\Entity\Abus $commentaire
     *
     * @return Abus
     */
    public function addCommentaire(\AppBundle\Entity\Abus $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \AppBundle\Entity\Abus $commentaire
     */
    public function removeCommentaire(\AppBundle\Entity\Abus $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set commentaires
     *
     * @param \AppBundle\Entity\Commentaire $commentaires
     *
     * @return Abus
     */
    public function setCommentaires(\AppBundle\Entity\Commentaire $commentaires = null)
    {
        $this->commentaires = $commentaires;

        return $this;
    }
}
