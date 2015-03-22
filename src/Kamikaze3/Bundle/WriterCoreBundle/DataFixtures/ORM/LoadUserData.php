<?php

namespace Kamikaze3\Bundle\WriterCoreBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kamikaze3\Bundle\WriterCoreBundle\Entity\User;

class LoadUserData extends AbstractFixture implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {

        $email = "test@example.com";
        $password = "12345678";

        $user = new User();
        $user->setEmail($email);
        $user->setUsername($email);
        $user->setPlainPassword($password);
        $manager->persist($user);
        $manager->flush();
    }
}
