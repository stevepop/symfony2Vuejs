<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName('Jane');
        $user->setLastName('Doe');
        $user->setDob(new \DateTime('1995-08-15'));
        $user->setEmail('jane@doe.com');
        $user->setHomeAddress('1 London road, Essex');
        $user->setMobile('07910010010');
        $user->setPhone('02023412345');
        $user->setDepartment($this->getReference('dept'));

        $manager->persist($user);
        $manager->flush();

        $this->addReference('user', $user);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}