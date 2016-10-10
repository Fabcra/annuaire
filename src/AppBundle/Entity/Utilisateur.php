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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    

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
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\CodePostal", inversedBy="Utilisateur") 
     * 
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Localite", inversedBy="Utilisateur") 
     */
    private $localite;

    /**
     * @var string
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Commune", inversedBy="Utilisateur") 
     */
    private $commune;

    /**
     * @var string
     *
     * @ORM\Column(name="type_user", type="string", length=255)
     */
    private $type_user;

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
     * @ORM\ManytoMany(targetEntity="AppBundle\Entity\Categorie", inversedBy="Categorie")
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Stage", inversedBy="Utilisateur")
     */
    private $stage;

    /**
     * @var string
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Promotion", inversedBy="Utilisateur")
     */
    private $promotion;

    /**
     * @var int
     *
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
    function getNom() {
        return $this->nom;
    }

    function getType_user() {
        return $this->type_user;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setType_user($type_user) {
        $this->type_user = $type_user;
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
     * Constructor
     */
    public function __construct()
    {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set typeUser
     *
     * @param string $typeUser
     *
     * @return Utilisateur
     */
    public function setTypeUser($typeUser)
    {
        $this->type_user = $typeUser;

        return $this;
    }

    /**
     * Get typeUser
     *
     * @return string
     */
    public function getTypeUser()
    {
        return $this->type_user;
    }

    /**
     * Set codePostal
     *
     * @param \AppBundle\Entity\CodePostal $codePostal
     *
     * @return Utilisateur
     */
    public function setCodePostal(\AppBundle\Entity\CodePostal $codePostal = null)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return \AppBundle\Entity\CodePostal
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set localite
     *
     * @param \AppBundle\Entity\Localite $localite
     *
     * @return Utilisateur
     */
    public function setLocalite(\AppBundle\Entity\Localite $localite = null)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \AppBundle\Entity\Localite
     */
    public function getLocalite()
    {
        return $this->localite;
    }

    /**
     * Set commune
     *
     * @param \AppBundle\Entity\Commune $commune
     *
     * @return Utilisateur
     */
    public function setCommune(\AppBundle\Entity\Commune $commune = null)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return \AppBundle\Entity\Commune
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\Images $image
     *
     * @return Utilisateur
     */
    public function setImage(\AppBundle\Entity\Images $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\Images
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Utilisateur
     */
    public function addCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie[] = $categorie;

        return $this;
    }

    /**
     * Remove categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     */
    public function removeCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie->removeElement($categorie);
    }

    /**
     * Get categorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set stage
     *
     * @param \AppBundle\Entity\Stage $stage
     *
     * @return Utilisateur
     */
    public function setStage(\AppBundle\Entity\Stage $stage = null)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Get stage
     *
     * @return \AppBundle\Entity\Stage
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Set promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return Utilisateur
     */
    public function setPromotion(\AppBundle\Entity\Promotion $promotion = null)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return \AppBundle\Entity\Promotion
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Set ordre
     *
     * @param \AppBundle\Entity\Position $ordre
     *
     * @return Utilisateur
     */
    public function setOrdre(\AppBundle\Entity\Position $ordre = null)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return \AppBundle\Entity\Position
     */
    public function getOrdre()
    {
        return $this->ordre;
    }
}
