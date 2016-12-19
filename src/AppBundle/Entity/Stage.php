<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Stage
 *
 * @ORM\Table(name="stage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StageRepository")
 */
class Stage {

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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="tarif", type="string", length=255)
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="info_compl", type="string", length=255)
     */
    private $infoCompl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debute", type="datetime")
     */
    private $hdebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="datetime")
     */
    private $hfin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="affichage_de", type="datetime")
     */
    private $affichageDe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="affichage_jusque", type="datetime")
     */
    private $affichageJusque;

    /**
     *
     * @var type 
     * 
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="stages")
     */
    private $utilisateur;
    
    /**
     * @Gedmo\Slug(fields={"nom"})
     * @ORM\column(length=128, nullable=true)
     */
    private $slug;
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Stage
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Stage
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
     * Set tarif
     *
     * @param string $tarif
     *
     * @return Stage
     */
    public function setTarif($tarif) {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return string
     */
    public function getTarif() {
        return $this->tarif;
    }

    /**
     * Set infoCompl
     *
     * @param string $infoCompl
     *
     * @return Stage
     */
    public function setInfoCompl($infoCompl) {
        $this->infoCompl = $infoCompl;

        return $this;
    }

    /**
     * Get infoCompl
     *
     * @return string
     */
    public function getInfoCompl() {
        return $this->infoCompl;
    }

    
    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Stage
     */
    public function setFin($fin) {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin() {
        return $this->fin;
    }

    /**
     * Set affichageDe
     *
     * @param \DateTime $affichageDe
     *
     * @return Stage
     */
    public function setAffichageDe($affichageDe) {
        $this->affichageDe = $affichageDe;

        return $this;
    }

    /**
     * Get affichageDe
     *
     * @return \DateTime
     */
    public function getAffichageDe() {
        return $this->affichageDe;
    }

    /**
     * Set affichageJusque
     *
     * @param \DateTime $affichageJusque
     *
     * @return Stage
     */
    public function setAffichageJusque($affichageJusque) {
        $this->affichageJusque = $affichageJusque;

        return $this;
    }

    /**
     * Get affichageJusque
     *
     * @return \DateTime
     */
    public function getAffichageJusque() {
        return $this->affichageJusque;
    }

    function getUtilisateur() {
        return $this->utilisateur;
    }

    function setUtilisateur(type $utilisateur) {
        $this->utilisateur = $utilisateur;
    }

    public function __toString() {

        return $this->getNom();
                   
    }


    
    /**
     * Set hdebut
     *
     * @param \DateTime $hdebut
     *
     * @return Stage
     */
    public function setHdebut($hdebut)
    {
        $this->hdebut = $hdebut;

        return $this;
    }

    /**
     * Get hdebut
     *
     * @return \DateTime
     */
    public function getHdebut()
    {
        return $this->hdebut;
    }

    /**
     * Set hfin
     *
     * @param \DateTime $hfin
     *
     * @return Stage
     */
    public function setHfin($hfin)
    {
        $this->hfin = $hfin;

        return $this;
    }

    /**
     * Get hfin
     *
     * @return \DateTime
     */
    public function getHfin()
    {
        return $this->hfin;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Stage
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    
}
