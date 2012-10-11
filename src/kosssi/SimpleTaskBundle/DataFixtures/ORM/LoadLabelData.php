<?php

namespace kosssi\SimpleTaskBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use kosssi\SimpleTaskBundle\Entity\Label;

class LoadLabelData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $label = new Label();
        $label->setName('test');

        $manager->persist($label);
        $manager->flush();
    }
}