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
     * @var int
     *
     * @ORM\Column(name="Cote", type="integer")
     */
    private $cote;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Contenu", type="string", length=255)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Encodage", type="datetime")
     */
    private $encodage;
    
    /**
     * @var int
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="Utilisateur")
     */
    private $identifiant;
    
     /**
     * @var string
     *
      * 
      * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Commentaire", inversedBy="Commentaire")
     */
    private $abus;



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
    public function setIdentifiant(\AppBundle\Entity\Utilisateur $identifiant = null)
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * Get identifiant
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

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
}
