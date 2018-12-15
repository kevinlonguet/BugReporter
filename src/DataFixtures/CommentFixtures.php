<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 29/11/2018
 * Time: 23:28
 */

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Ticket;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Recuperation des tickets
        $em = $manager->getRepository(Ticket::class);
        $tickets = $em->findAll();

        // Recuperation des users
        $em = $manager->getRepository(User::class);
        $user = $em->findAll();

        for ($i = 0; $i < 20; $i++) {
            $comment = (new Comment())
                ->setContent($faker->sentence())
                ->setIdTicket($tickets[(array_rand($tickets))])
                ->setIdAuthor($user[(array_rand($user))]);

            $manager->persist($comment);
        }

        $manager->flush();


    }

    public function getDependencies()
    {
        return array(
            TicketFixtures::class,
            UserFixtures::class
        );
    }

}
