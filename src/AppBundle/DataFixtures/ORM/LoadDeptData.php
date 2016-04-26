<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Department;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDeptData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $department = new Department();
        $department->setName('IT');
        $manager->persist($department);


        $department = new Department();
        $department->setName('Sales');
        $manager->persist($department);

        $department = new Department();
        $department->setName('Marketing');
        $manager->persist($department);
        
        $manager->flush();

        $this->addReference('dept', $department);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}