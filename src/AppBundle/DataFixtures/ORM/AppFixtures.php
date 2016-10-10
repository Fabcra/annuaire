<?php



namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;

class AppFixtures extends AbstractLoader
{
    /**
     * {@inheritdoc}
     */
    public function getFixtures()
    {
        return [
            __DIR__.'/Utilisateur.yml',
            
        ];
    }
}
