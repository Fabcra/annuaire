<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;

class AppFixtures extends AbstractLoader {

    /**
     * {@inheritdoc}
     */
    public function getFixtures() {
        return [
            
            __DIR__ . '/Codepostal.yml',
            __DIR__ . '/Localite.yml',
            __DIR__ . '/Commune.yml',
            __DIR__ . '/Utilisateur.yml',
            __DIR__ . '/Image.yml',
            __DIR__ . '/Categorie.yml',
            __DIR__ . '/Stage.yml',
            __DIR__ . '/Promotion.yml',
            __DIR__ . '/Abus.yml',
            __DIR__ . '/Bloc.yml',
            __DIR__ . '/Position.yml',
            __DIR__ . '/Newsletter.yml'
        ];
    }

    public function userType() {
        $usertypes = array(
            'prestataire',
            'internaute',
        );
        return $usertypes[array_rand($usertypes)];
    }
    

}
