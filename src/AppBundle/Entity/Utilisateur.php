<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur {

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
     * @ORM\Column(name="identifiant", type="integer", unique=true)
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="motdepasse", type="string", length=255)
     */
    private $motdepasse;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="adressenum", type="string", length=255)
     */
    private $adressenum;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePostal", type="string", length=255)
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\CodePostal", inversedBy="Utilisateur") 
     * 
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="Localite", type="string", length=255)
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Localite", inversedBy="Utilisateur") 
     */
    private $localite;

    /**
     * @var string
     *
     * @ORM\Column(name="commune", type="string", length=255)
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Commune", inversedBy="Utilisateur") 
     */
    private $commune;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscription", type="datetime")
     */
    private $inscription;

    /**
     * @var int
     *
     * @ORM\Column(name="nbessais", type="integer")
     */
    private $nbessais;

    /**
     * @var bool
     *
     * @ORM\Column(name="banni", type="boolean")
     */
    private $banni;

    /**
     * @var bool
     *
     * @ORM\Column(name="inscriptionconf", type="boolean")
     */
    private $inscriptionconf;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255)
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="numtel", type="string", length=255)
     */
    private $numtel;

    /**
     * @var string
     *
     * @ORM\Column(name="numtva", type="string", length=255)
     */
    private $numtva;

    /**
     * @var bool
     *
     * @ORM\Column(name="newsletter", type="boolean")
     */
    private $newsletter;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="blob")
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Images", inversedBy="Utilisateur") 
     */
    private $image;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     * 
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Abus", inversedBy="Utilisateur")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     * @ORM\ManytoMany(targetEntity="AppBundle\Entity\Categorie", inversedBy="Categorie")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Stage", inversedBy="Utilisateur")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Promotion", inversedBy="Utilisateur")
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="Ordre", type="integer")
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Position", inversedBy="Utilisateur")
     */
    private $ordre;

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
     * Set email
     *
     * @param string $email
     *
     * @return Utilisateur
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set motdepasse
     *
     * @param string $motdepasse
     *
     * @return Utilisateur
     */
    public function setMotdepasse($motdepasse) {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    /**
     * Get motdepasse
     *
     * @return string
     */
    public function getMotdepasse() {
        return $this->motdepasse;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Utilisateur
     */
    public function setAdresse($adresse) {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse() {
        return $this->adresse;
    }

    /**
     * Set adressenum
     *
     * @param string $adressenum
     *
     * @return Utilisateur
     */
    public function setAdressenum($adressenum) {
        $this->adressenum = $adressenum;

        return $this;
    }

    /**
     * Get adressenum
     *
     * @return string
     */
    public function getAdressenum() {
        return $this->adressenum;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return CodePostal
     */
    public function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal() {
        return $this->codePostal;
    }

    /**
     * Set localite
     *
     * @param string $localite
     *
     * @return Localite
     */
    public function setLocalite($localite) {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return string
     */
    public function getLocalite() {
        return $this->localite;
    }

    public function setCommune($commune) {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return string
     */
    public function getCommune() {
        return $this->commune;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Utilisateur
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set inscription
     *
     * @param \DateTime $inscription
     *
     * @return Utilisateur
     */
    public function setInscription($inscription) {
        $this->inscription = $inscription;

        return $this;
    }

    /**
     * Get inscription
     *
     * @return \DateTime
     */
    public function getInscription() {
        return $this->inscription;
    }

    /**
     * Set nbessais
     *
     * @param integer $nbessais
     *
     * @return Utilisateur
     */
    public function setNbessais($nbessais) {
        $this->nbessais = $nbessais;

        return $this;
    }

    /**
     * Get nbessais
     *
     * @return int
     */
    public function getNbessais() {
        return $this->nbessais;
    }

    /**
     * Set banni
     *
     * @param boolean $banni
     *
     * @return Utilisateur
     */
    public function setBanni($banni) {
        $this->banni = $banni;

        return $this;
    }

    /**
     * Get banni
     *
     * @return bool
     */
    public function getBanni() {
        return $this->banni;
    }

    /**
     * Set inscriptionconf
     *
     * @param boolean $inscriptionconf
     *
     * @return Utilisateur
     */
    public function setInscriptionconf($inscriptionconf) {
        $this->inscriptionconf = $inscriptionconf;

        return $this;
    }

    /**
     * Get inscriptionconf
     *
     * @return bool
     */
    public function getInscriptionconf() {
        return $this->inscriptionconf;
    }

    /**
     * Set site
     *
     * @param string $site
     *
     * @return Utilisateur
     */
    public function setSite($site) {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite() {
        return $this->site;
    }

    /**
     * Set numtel
     *
     * @param string $numtel
     *
     * @return Utilisateur
     */
    public function setNumtel($numtel) {
        $this->numtel = $numtel;

        return $this;
    }

    /**
     * Get numtel
     *
     * @return string
     */
    public function getNumtel() {
        return $this->numtel;
    }

    /**
     * Set numtva
     *
     * @param string $numtva
     *
     * @return Utilisateur
     */
    public function setNumtva($numtva) {
        $this->numtva = $numtva;

        return $this;
    }

    /**
     * Get numtva
     *
     * @return string
     */
    public function getNumtva() {
        return $this->numtva;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     *
     * @return Utilisateur
     */
    public function setNewsletter($newsletter) {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return bool
     */
    public function getNewsletter() {
        return $this->newsletter;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage() {
        return $this->image;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Categorie
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

}
