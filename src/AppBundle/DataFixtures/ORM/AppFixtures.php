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
            __DIR__. '/Commune.yml',
            __DIR__ . '/Utilisateur.yml',
            __DIR__ . '/Image.yml',
        ];
    }
    
    public function userType()
    {
        $usertypes = array(
            'prestataire',
            'internaute',
        );
        return $usertypes[array_rand($usertypes)];
    }

}
