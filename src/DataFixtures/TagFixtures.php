<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 29/11/2018
 * Time: 23:28
 */

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TagFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $tag = (new Tag())
            ->setLabel("Nouveauté");
        $manager->persist($tag);

        $tag = (new Tag())
            ->setLabel("Bug");
        $manager->persist($tag);

        $tag = (new Tag())
            ->setLabel("Amélioration");
        $manager->persist($tag);

        $tag = (new Tag())
            ->setLabel("Question");
        $manager->persist($tag);

        $manager->flush();
    }
}
