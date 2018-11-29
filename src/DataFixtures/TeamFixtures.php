<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 29/11/2018
 * Time: 23:28
 */

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $team = (new Team())
            ->setLabel("DevTeam Albatros");
        $manager->persist($team);

        $team = (new Team())
            ->setLabel("DevTeam Piment");
        $manager->persist($team);

        $team = (new Team())
            ->setLabel("DevTeam Goyave");
        $manager->persist($team);

        $team = (new Team())
            ->setLabel("DevTeam Zebre");
        $manager->persist($team);

        $manager->flush();
    }
}
