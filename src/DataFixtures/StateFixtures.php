<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 29/11/2018
 * Time: 23:28
 */

namespace App\DataFixtures;

use App\Entity\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StateFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $state = (new State())
            ->setLabel("Ouvert");
        $manager->persist($state);

        $state = (new State())
            ->setLabel("En cours");
        $manager->persist($state);

        $state = (new State())
            ->setLabel("En test");
        $manager->persist($state);

        $state = (new State())
            ->setLabel("Terminé");
        $manager->persist($state);

        $state = (new State())
            ->setLabel("Clos");
        $manager->persist($state);

        $manager->flush();
    }
}
