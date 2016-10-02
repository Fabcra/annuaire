<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 */
class Categorie {

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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="EnAvant", type="boolean")
     */
    private $enAvant;

    /**
     * @var bool
     *
     * @ORM\Column(name="Valide", type="boolean")
     */
    private $valide;

    /**
     * @var int
     *
     * @ORM\Column(name="identifiant", type="integer", unique=true)
     * @ORM\ManytoMany(targetEntity="Appbundle\Entity\Utilisateur", mappedBy="Utilisateur")
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="blob")
     * @ORM\ManytoOne(targetEntity="Appbundle\Entity\Categorie", inversedBy="Categorie")
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

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Categorie
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
     * Set enAvant
     *
     * @param boolean $enAvant
     *
     * @return Categorie
     */
    public function setEnAvant($enAvant) {
        $this->enAvant = $enAvant;

        return $this;
    }

    /**
     * Get enAvant
     *
     * @return bool
     */
    public function getEnAvant() {
        return $this->enAvant;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     *
     * @return Categorie
     */
    public function setValide($valide) {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return bool
     */
    public function getValide() {
        return $this->valide;
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

    public function setImage($image) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage() {
        return $this->image;
    }

}
