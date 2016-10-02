<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionRepository")
 */
class Promotion {

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
     * @var string
     *
     * @ORM\Column(name="DocumentPDF", type="blob")
     */
    private $documentPDF;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Debut", type="datetime")
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fin", type="datetime")
     */
    private $fin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="AffichageDe", type="datetime")
     */
    private $affichageDe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="AffichageJusque", type="datetime")
     */
    private $affichageJusque;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     * @ORM\ManytoOne(targetEntity="AppBundle\Entity\Categorie", mappedBy="Categorie")
     */
    private $nom;

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
     * @return Promotion
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
     * @return Promotion
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
     * Set documentPDF
     *
     * @param string $documentPDF
     *
     * @return Promotion
     */
    public function setDocumentPDF($documentPDF) {
        $this->documentPDF = $documentPDF;

        return $this;
    }

    /**
     * Get documentPDF
     *
     * @return string
     */
    public function getDocumentPDF() {
        return $this->documentPDF;
    }

    /**
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Promotion
     */
    public function setDebut($debut) {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut() {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Promotion
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
     * @return Promotion
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
     * @return Promotion
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

}
