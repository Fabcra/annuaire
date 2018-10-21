<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur implements UserInterface, \Serializable {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     * 
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     * 
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     * 
     */
    private $password;
    
    

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="adressenum", type="string", length=255, nullable=true)
     */
    private $adressenum;

    /**
     * @var string
     *
     * @ORM\Column(name="typeUser", type="string", length=255)
     */
    private $typeUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscription", type="datetime")
     * 
     */
    private $inscription;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_essais", type="integer", nullable=true)
     */
    private $nbessais;

    /**
     * @var bool
     *
     * @ORM\Column(name="banni", type="boolean", nullable=true)
     */
    private $banni;

    /**
     * @var bool
     *
     * @ORM\Column(name="inscription_conf", type="boolean", nullable=true)
     */
    private $inscriptionconf;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255, nullable=true)
     * 
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel", type="string", length=255, nullable=true)
     */
    private $numtel;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tva", type="string", length=255, nullable=true)
     */
    private $numtva;

    /**
     * @var bool
     *
     * @ORM\Column(name="newsletter", type="boolean", nullable=true)
     */
    private $newsletter;

    /**
     * @var string
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\CodePostal") 
     * 
     * 
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Localite")
     * @ORM\JoinColumn(name="localite", referencedColumnName="id")
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
     * @ORM\OnetoMany(targetEntity="Image", mappedBy="utilisateur", cascade={"persist"})
     * 
     * @ORM\JoinColumn(nullable=true) 
     */
    private $imagesgalerie;

    /**
     *
     * @var string
     * 
     * @ORM\OnetoOne(targetEntity="AppBundle\Entity\Image", cascade={"persist", "remove"})
     * 
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     * 
     * 
     */
    private $avatar;

    /**
     * @var string
     * 
     * @ORM\OnetoOne(targetEntity="AppBundle\Entity\Image", cascade={"persist", "remove"})
     * 
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     * 
     * 
     */
    private $logo;

    /**
     * @var string
     *
     * 
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Abus", mappedBy="utilisateur")
     * 
     */
    private $abus;

    /**
     * @var string
     * 
     *
     * @ORM\ManytoMany(targetEntity="AppBundle\Entity\Categorie", inversedBy="utilisateurs")
     * @ORM\JoinTable(name="utilisateur_categorie")
     */
    private $categories;

    /**
     * @var string
     *
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Stage", mappedBy="utilisateur")
     * 
     */
    private $stages;

    /**
     * @var string
     *
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Promotion", mappedBy="utilisateur")
     * 
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $promotions;

    /**
     * @var int
     *
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Position", inversedBy="utilisateurs")
     * 
     * 
     */
    private $position;

    /**
     * 
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\Commentaire", mappedBy="utilisateur")
     */
    private $commentaires;

    /**
     * @Gedmo\Slug(fields={"username"})
     * @ORM\column(length=128, nullable=true)
     */
    private $slug;

    /**
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = [];

    /**
     * Constructor
     */
    public function __construct() {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->stages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promotions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->abus = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isActive = true;
        $this->inscription = new \DateTime();
        $this->imagesgalerie = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set Username
     *
     * @param string $username
     *
     * @return Utilisateur
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

//   SECURITY

    /**
     * Get Username
     *
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    public function getRoles() {

        $roles = $this->roles;
        if (!in_array('ROLE_USER', $roles)) {
            $roles[] = 'ROLE_USER';
        }
        return $roles;
    }

    public function eraseCredentials() {
        
    }

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    public function unserialize($serialized) {
        list(
                $this->id,
                $this->username,
                $this->password,
                ) = unserialize($serialized);
    }

    public function getSalt() {

        return null;
    }

//    ENDSECURITY

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
     * @param string $password 
     *
     * @return Utilisateur
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get motdepasse
     *
     */
    public function getPassword() {
        return $this->password;
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
     * Set position
     *
     * @param \AppBundle\Entity\Position $position
     *
     * @return Utilisateur
     */
    public function setPosition(\AppBundle\Entity\Position $position = null) {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \AppBundle\Entity\Position
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\Categorie $category
     *
     * @return Utilisateur
     */
    public function addCategory(\AppBundle\Entity\Categorie $category) {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Categorie $category
     */
    public function removeCategory(\AppBundle\Entity\Categorie $category) {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * Add stage
     *
     * @param \AppBundle\Entity\Stage $stage
     *
     * @return Utilisateur
     */
    public function addStage(\AppBundle\Entity\Stage $stage) {
        $this->stages[] = $stage;

        return $this;
    }

    /**
     * Remove stage
     *
     * @param \AppBundle\Entity\Stage $stage
     */
    public function removeStage(\AppBundle\Entity\Stage $stage) {
        $this->stages->removeElement($stage);
    }

    /**
     * Get stages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStages() {
        return $this->stages;
    }

    /**
     * Add promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return Utilisateur
     */
    public function addPromotion(\AppBundle\Entity\Promotion $promotion) {
        $this->promotions[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     */
    public function removePromotion(\AppBundle\Entity\Promotion $promotion) {
        $this->promotions->removeElement($promotion);
    }

    /**
     * Get promotions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotions() {
        return $this->promotions;
    }

    /**
     * Set abus
     *
     * @param string $abus
     *
     * @return Utilisateur
     */
    public function setAbus($abus) {
        $this->abus = $abus;

        return $this;
    }

    /**
     * Get abus
     *
     * @return string
     */
    public function getAbus() {
        return $this->abus;
    }

    /**
     * Add abus
     *
     * @param \AppBundle\Entity\Abus $abus
     *
     * @return Utilisateur
     */
    public function addAbus(\AppBundle\Entity\Abus $abus) {
        $this->abus[] = $abus;

        return $this;
    }

    /**
     * Remove abus
     *
     * @param \AppBundle\Entity\Abus $abus
     */
    public function removeAbus(\AppBundle\Entity\Abus $abus) {
        $this->abus->removeElement($abus);
    }

    /**
     * Add commentaire
     *
     * @param \AppBundle\Entity\Commentaire $commentaire
     *
     * @return Utilisateur
     */
    public function addCommentaire(\AppBundle\Entity\Commentaire $commentaire) {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \AppBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\AppBundle\Entity\Commentaire $commentaire) {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires() {
        return $this->commentaires;
    }

    public function getSlug() {
        return $this->slug;
    }

    function setSlug($slug) {
        $this->slug = $slug;
    }

    function getTypeUser() {
        return $this->typeUser;
    }

    function setTypeUser($typeUser) {
        $this->typeUser = $typeUser;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Utilisateur
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive() {
        return $this->isActive;
    }

    /**
     * Set avatar
     *
     * @param \AppBundle\Entity\Image $avatar
     *
     * @return Utilisateur
     */
    public function setAvatar(\AppBundle\Entity\Image $avatar = null) {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \AppBundle\Entity\Image
     */
    public function getAvatar() {
        return $this->avatar;
    }

    /**
     * Set logo
     *
     * @param \AppBundle\Entity\Image $logo
     *
     * @return Utilisateur
     */
    public function setLogo(\AppBundle\Entity\Image $logo = null) {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return \AppBundle\Entity\Image
     */
    public function getLogo() {
        return $this->logo;
    }

    /**
     * Add imagesgalerie
     *
     * @param \AppBundle\Entity\Image $imagesgalerie
     *
     * @return Utilisateur
     */
    public function addImagesgalerie(\AppBundle\Entity\Image $imagesgalerie) {
        $this->imagesgalerie[] = $imagesgalerie;

        return $this;
    }

    /**
     * Remove imagesgalerie
     *
     * @param \AppBundle\Entity\Image $imagesgalerie
     */
    public function removeImagesgalerie(\AppBundle\Entity\Image $imagesgalerie) {
        $this->imagesgalerie->removeElement($imagesgalerie);
    }

    /**
     * Get imagesgalerie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagesgalerie() {
        return $this->imagesgalerie;
    }

    function setRoles($roles) {
        $this->roles = $roles;
    }

    
}
