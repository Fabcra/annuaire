<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bloc
 *
 * @ORM\Table(name="bloc")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlocRepository")
 */
class Bloc
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
     * @ORM\Column(name="nom_bloc", type="string", length=255)
     */
    private $nom_bloc;

    /**
     * @var string
     *
     * @ORM\Column(name="description_bloc", type="string", length=255)
     */
    private $description_bloc;


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
     * @return Bloc
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
     * @return Bloc
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
     * Set nomBloc
     *
     * @param string $nomBloc
     *
     * @return Bloc
     */
    public function setNomBloc($nomBloc)
    {
        $this->nom_bloc = $nomBloc;

        return $this;
    }

    /**
     * Get nomBloc
     *
     * @return string
     */
    public function getNomBloc()
    {
        return $this->nom_bloc;
    }

    /**
     * Set descriptionBloc
     *
     * @param string $descriptionBloc
     *
     * @return Bloc
     */
    public function setDescriptionBloc($descriptionBloc)
    {
        $this->description_bloc = $descriptionBloc;

        return $this;
    }

    /**
     * Get descriptionBloc
     *
     * @return string
     */
    public function getDescriptionBloc()
    {
        return $this->description_bloc;
    }
}
