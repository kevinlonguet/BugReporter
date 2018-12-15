<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 29/11/2018
 * Time: 23:28
 */

namespace App\DataFixtures;

use App\Entity\State;
use App\Entity\Tag;
use App\Entity\Team;
use App\Entity\Ticket;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class TicketFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();

        // Recuperation des users
        $em = $manager->getRepository("App:User");
        $users = $em->findAll();

        // Recuperations des status
        $em = $manager->getRepository("App:State");
        $states = $em->findAll();

        // Recuperations des tags
        $em = $manager->getRepository("App:Tag");
        $tags = $em->findAll();

        // Recuperations des teams
        $em = $manager->getRepository("App:Team");
        $teams = $em->findAll();


        for ($i = 0; $i < 20; $i++) {
            $ticket = (new Ticket())
                ->setTitle($faker->title)
                ->setNote($faker->numberBetween(-100, 100))
                ->setContent($faker->sentence)
                ->setDescription($faker->sentence)
                ->setIdAuthor($users[(array_rand($users))])
                ->setIdState($states[(array_rand($states))])
                ->setIdTag($tags[(array_rand($tags))])
                ->setIdTeamAssign($teams[(array_rand($teams))]);

            $manager->persist($ticket);
        }

        $manager->flush();

    }

    public function getDependencies()
    {
        return array(
            User::class,
            State::class,
            Tag::class,
            Team::class
        );
    }

}
