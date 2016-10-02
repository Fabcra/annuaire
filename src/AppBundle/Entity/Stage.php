<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="stage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StageRepository")
 */
class Stage
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
     * @ORM\Column(name="Tarif", type="string", length=255)
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="InfoCompl", type="string", length=255)
     */
    private $infoCompl;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Stage
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Stage
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

    /**
     * Set tarif
     *
     * @param string $tarif
     *
     * @return Stage
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return string
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set infoCompl
     *
     * @param string $infoCompl
     *
     * @return Stage
     */
    public function setInfoCompl($infoCompl)
    {
        $this->infoCompl = $infoCompl;

        return $this;
    }

    /**
     * Get infoCompl
     *
     * @return string
     */
    public function getInfoCompl()
    {
        return $this->infoCompl;
    }

    /**
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Stage
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Stage
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set affichageDe
     *
     * @param \DateTime $affichageDe
     *
     * @return Stage
     */
    public function setAffichageDe($affichageDe)
    {
        $this->affichageDe = $affichageDe;

        return $this;
    }

    /**
     * Get affichageDe
     *
     * @return \DateTime
     */
    public function getAffichageDe()
    {
        return $this->affichageDe;
    }

    /**
     * Set affichageJusque
     *
     * @param \DateTime $affichageJusque
     *
     * @return Stage
     */
    public function setAffichageJusque($affichageJusque)
    {
        $this->affichageJusque = $affichageJusque;

        return $this;
    }

    /**
     * Get affichageJusque
     *
     * @return \DateTime
     */
    public function getAffichageJusque()
    {
        return $this->affichageJusque;
    }
}

