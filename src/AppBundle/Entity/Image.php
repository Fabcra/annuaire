<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Images
 *
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImagesRepository")
 */
class Image {

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
     * @ORM\Column(name="ordre", type="integer", nullable=true)
     * 
     * 
     */
    private $ordre;

    /**
     * 
     * @var url 
     * @ORM\Column(name="url", type="string", length=256, nullable=false)
     */
    private $url = "";

    /**
     * @var url
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="imagesgalerie", cascade="persist")
     * 
     */
    private $utilisateur;

    /**
     * @var string
     * 
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @var Categorie
     * 
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Categorie")
     * 
     *
     * 
     * 
     */
    private $categorie;

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
     * @return Images
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

    function getUrl() {
        return $this->url;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    public function __toString() {
        return $this->url;
                    
    }

    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Image
     */
    public function setCategorie(\AppBundle\Entity\Categorie $categorie = null) {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getCategorie() {
        return $this->categorie;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->type = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add type
     *
     * @param \AppBundle\Entity\Utilisateur $type
     *
     * @return Image
     */
    public function addType(\AppBundle\Entity\Utilisateur $type) {
        $this->type[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \AppBundle\Entity\Utilisateur $type
     */
    public function removeType(\AppBundle\Entity\Utilisateur $type) {
        $this->type->removeElement($type);
    }

    /**
     * Get type
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Image
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    
    
   


    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Image
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
