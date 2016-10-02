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
     * @ORM\Column(name="identifiant", type="integer", unique=true)
     * 
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Utilisateur", mappedBy="Utilisateur")
     */
    private $identifiant;
    
     /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
      * 
      * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Commentaire", inversedBy="Commentaire")
     */
    private $description;



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
    public function setIdentifiant($identifiant) {
        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * Get identifiant
     *
     * @return int
     */
    public function getIdentifiant() {
        return $this->identifiant;
    }
    
    /**
     * Set description
     *
     * @param string $description
     *
     * @return Abus
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

