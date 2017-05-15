<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\Column(name="cote", type="integer")
     */
    private $cote;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="encodage", type="datetime")
     */
    private $encodage;
    
    /**
     * @var int
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="commentaires")
     */
    private $utilisateur;
    
     /**
     * @var string
     *
      * 
      * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Abus", mappedBy="commentaires")
     */
    private $abus;
    
    /**
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Utilisateur")
     * 
     */
    private $redacteur; 

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cote
     *
     * @param integer $cote
     *
     * @return Commentaire
     */
    public function setCote($cote)
    {
        $this->cote = $cote;

        return $this;
    }

    /**
     * Get cote
     *
     * @return int
     */
    public function getCote()
    {
        return $this->cote;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Commentaire
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Commentaire
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set encodage
     *
     * @param \DateTime $encodage
     *
     * @return Commentaire
     */
    public function setEncodage($encodage)
    {
        $this->encodage = $encodage;

        return $this;
    }

    /**
     * Get encodage
     *
     * @return \DateTime
     */
    public function getEncodage()
    {
        return $this->encodage;
    }
    
    /**
     * Set identifiant
     *
     * @param integer $identifiant
     *
     * @return Utilisateur
     */
    

    /**
     * Set identifiant
     *
     * @param \AppBundle\Entity\Utilisateur $identifiant
     *
     * @return Commentaire
     */
  
    /**
     * Set abus
     *
     * @param \AppBundle\Entity\Commentaire $abus
     *
     * @return Commentaire
     */
    public function setAbus(\AppBundle\Entity\Commentaire $abus = null)
    {
        $this->abus = $abus;

        return $this;
    }

    /**
     * Get abus
     *
     * @return \AppBundle\Entity\Commentaire
     */
    public function getAbus()
    {
        return $this->abus;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Commentaire
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->abus = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add abus
     *
     * @param \AppBundle\Entity\Abus $abus
     *
     * @return Commentaire
     */
    public function addAbus(\AppBundle\Entity\Abus $abus)
    {
        $this->abus[] = $abus;

        return $this;
    }

    /**
     * Remove abus
     *
     * @param \AppBundle\Entity\Abus $abus
     */
    public function removeAbus(\AppBundle\Entity\Abus $abus)
    {
        $this->abus->removeElement($abus);
    }

    /**
     * Set redacteur
     *
     * @param \AppBundle\Entity\Utilisateur $redacteur
     *
     * @return Commentaire
     */
    public function setRedacteur(\AppBundle\Entity\Utilisateur $redacteur = null)
    {
        $this->redacteur = $redacteur;

        return $this;
    }

    /**
     * Get redacteur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getRedacteur()
    {
        return $this->redacteur;
        
    }
    
    
}
