<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Images
 *
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImagesRepository")
 * @Vich\Uploadable
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
     * @var type 
     * @ORM\Column(name="url", type="string", length=256, nullable=false)
     */
    private $url = "";

    /**
     * @var Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="images")
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
     * UPLOAD IMAGES
     * 
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="image", fileNameProperty="imageName")
     * 
     * @ORM\Column(nullable=true)
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     * 
     * @ORM\Column(nullable=true)
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     * 
     *
     * @var \DateTime
     * 
     * @ORM\Column(nullable=true)
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return string
     */
    public function setImageFile(File $image = null) {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile() {
        return $this->imageFile;
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

    function getUtilisateur() {
        return $this->utilisateur;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setUtilisateur(Utilisateur $utilisateur) {
        $this->utilisateur = $utilisateur;
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Image
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
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
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Image
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }
}
