<?php

namespace kosssi\SimpleTaskBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use kosssi\SimpleTaskBundle\Entity\Dashboard;
use kosssi\SimpleTaskBundle\Entity\Label;

class LoadData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $dashboard = new Dashboard();
        $dashboard->setUser('kosssi');

        $label = new Label();
        $label->setName('test');
        $label->setDashboard($dashboard);

        $manager->persist($dashboard);
        $manager->persist($label);
        $manager->flush();
    }
}