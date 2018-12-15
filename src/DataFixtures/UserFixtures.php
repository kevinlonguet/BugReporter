<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 29/11/2018
 * Time: 23:28
 */

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $user = (new User())
                ->setEmail($faker->email)
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setPassword($faker->password)
                ->setRoles(["ROLE_USER"]);

            $manager->persist($user);
        }

        $manager->flush();
    }

}
