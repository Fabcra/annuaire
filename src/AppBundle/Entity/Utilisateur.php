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
     * @var string
     * 
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nomUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe", type="string", length=255)
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
     * @ORM\Column(name="type_user", type="string", length=255)
     */
    private $type_user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscription", type="datetime", nullable=true)
     * 
     */
    private $inscription;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_essais", type="integer")
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
     * @ORM\Column(name="inscription_conf", type="boolean")
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
     * @ORM\Column(name="num_tel", type="string", length=255)
     */
    private $numtel;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tva", type="string", length=255)
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
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\CodePostal") 
     * 
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Localite")
     * @ORM\JoinColumn(onDelete="CASCADE", name="localite", referencedColumnName="id")
     * 
     */
    private $localite;

    /**
     * @var string
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Commune")
     *  
     */
    private $commune;
    
    /**
     * @var string
     *
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Image", mappedBy="utilisateur")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $images;
    
    /**
     * @var string
     *
     * 
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Abus", mappedBy="utilisateur")
     */
    private $abus;

    /**
     * @var string
     * 
     *
     * @ORM\ManytoMany(targetEntity="AppBundle\Entity\Categorie")
     * @ORM\JoinTable(name="utilisateur_categorie")
     */
    private $categories;

    /**
     * @var string
     *
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Stage", mappedBy="utilisateur")
     */
    private $stages;

    /**
     * @var string
     *
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Promotion", mappedBy="utilisateur")
     */
    private $promotions;

    /**
     * @var int
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Position")
     */
    private $position;

    
    /**
     * 
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Commentaire", mappedBy="utilisateur")
     */
    private $commentaires;

    

    /**
     * Constructor
     */
    public function __construct() {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->stages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promotions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->abus = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
        
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
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
     * Set typeUser
     *
     * @param string $typeUser
     *
     * @return Utilisateur
     */
    public function setTypeUser($typeUser) {
        $this->type_user = $typeUser;

        return $this;
    }

    /**
     * Get typeUser
     *
     * @return string
     */
    public function getTypeUser() {
        return $this->type_user;
    }

    /**
     * Set codePostal
     *
     * @param \AppBundle\Entity\CodePostal $codePostal
     *
     * @return Utilisateur
     */
    public function setCodePostal(\AppBundle\Entity\CodePostal $codePostal = null) {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return \AppBundle\Entity\CodePostal
     */
    public function getCodePostal() {
        return $this->codePostal;
    }

    /**
     * Set localite
     *
     * @param \AppBundle\Entity\Localite $localite
     *
     * @return Utilisateur
     */
    public function setLocalite(\AppBundle\Entity\Localite $localite = null) {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \AppBundle\Entity\Localite
     */
    public function getLocalite() {
        return $this->localite;
    }

    /**
     * Set commune
     *
     * @param \AppBundle\Entity\Commune $commune
     *
     * @return Utilisateur
     */
    public function setCommune(\AppBundle\Entity\Commune $commune = null) {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return \AppBundle\Entity\Commune
     */
    public function getCommune() {
        return $this->commune;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Utilisateur
     */
    public function setImages(array $images = null) {
        $this->images = $images;

        return $this;
    }

    /**
     * Get image
     *
     * @return ArrayCollection
     */
    public function getImages() {
        return $this->images;
    }

    public function getFirstImage() {
        if (isset($this->images[0])) {
            return $this->images[0];
        }
        return null;
    }
 
    /**
     * Set promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return Utilisateur
     */
    public function setPromotion(\AppBundle\Entity\Promotion $promotion = null) {
        $this->promotions = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return \AppBundle\Entity\Promotion
     */
    public function getPromotion() {
        return $this->promotions;
    }

    /**
     * Set nomUtilisateur
     *
     * @param string $nomUtilisateur
     *
     * @return Utilisateur
     */
    public function setNomUtilisateur($nomUtilisateur) {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    /**
     * Get nomUtilisateur
     *
     * @return string
     */
    public function getNomUtilisateur() {
        return $this->nomUtilisateur;
    }

    /**
     * Add image
     *
     * @param \AppBundle\Entity\Images $image
     *
     * @return Utilisateur
     */
    public function addImage(\AppBundle\Entity\Image $image) {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Images $image
     */
    public function removeImage(\AppBundle\Entity\Image $image) {
        $this->images->removeElement($image);
    }

    
    
    /**
     * Set position
     *
     * @param \AppBundle\Entity\Position $position
     *
     * @return Utilisateur
     */
    public function setPosition(\AppBundle\Entity\Position $position = null)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \AppBundle\Entity\Position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\Categorie $category
     *
     * @return Utilisateur
     */
    public function addCategory(\AppBundle\Entity\Categorie $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Categorie $category
     */
    public function removeCategory(\AppBundle\Entity\Categorie $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add stage
     *
     * @param \AppBundle\Entity\Stage $stage
     *
     * @return Utilisateur
     */
    public function addStage(\AppBundle\Entity\Stage $stage)
    {
        $this->stages[] = $stage;

        return $this;
    }

    /**
     * Remove stage
     *
     * @param \AppBundle\Entity\Stage $stage
     */
    public function removeStage(\AppBundle\Entity\Stage $stage)
    {
        $this->stages->removeElement($stage);
    }

    /**
     * Get stages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStages()
    {
        return $this->stages;
    }

    /**
     * Add promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return Utilisateur
     */
    public function addPromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotions[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     */
    public function removePromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotions->removeElement($promotion);
    }

    /**
     * Get promotions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotions()
    {
        return $this->promotions;
    }
    
    

    /**
     * Set abus
     *
     * @param string $abus
     *
     * @return Utilisateur
     */
    public function setAbus($abus)
    {
        $this->abus = $abus;

        return $this;
    }

    /**
     * Get abus
     *
     * @return string
     */
    public function getAbus()
    {
        return $this->abus;
    }

    /**
     * Add abus
     *
     * @param \AppBundle\Entity\Abus $abus
     *
     * @return Utilisateur
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
     * Add commentaire
     *
     * @param \AppBundle\Entity\Commentaire $commentaire
     *
     * @return Utilisateur
     */
    public function addCommentaire(\AppBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \AppBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\AppBundle\Entity\Commentaire $commentaire)
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
}
