<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * preregister
 *
 * @ORM\Table(name="preregister")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\preregisterRepository")
 */
class Preregister {

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
     * @Assert\NotBlank()
     * 
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $mail;

    /**
     *
     * @var string
     * 
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @var string
     * 
     * @ORM\Column(name="typeUser", type="string", length=255)
     */
    private $typeUser;

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
     * @return preregister
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
     * Set mail
     *
     * @param string $mail
     *
     * @return preregister
     */
    public function setMail($mail) {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail() {
        return $this->mail;
    }

    function getToken() {
        return $this->token;
    }

    function setToken() {

        $this->token = sha1(uniqid(mt_rand(), true));
    }
    
    function getTypeUser() {
        return $this->typeUser;
    }

    function setTypeUser($typeUser) {
        $this->typeUser = $typeUser;
    }



}
