<?php

/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 24/01/2018
 * Time: 11:25
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\PsychicPower;

class LoadPsychicPowerData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $psyDatas = array(
            '0' => array(
                'name' => 'Smite',
                'range' => 18,
                'description' => "1d3 BM",
                'category' => 'Smites',
                'power' => 5
            ),
        );


        foreach($psyDatas as $psyData)
        {
            $power = new PsychicPower();
            $power->setName($psyData['name']);
            $power->setDescription($psyData['description']);
            $power->setRange($psyData['range']);
            $power->setPower($psyData['power']);
            $power->setPsychicCategory($this->getReference($psyData['category']));


            $manager->persist($power);
            $manager->flush();

            $this->addReference($power->getName(), $power);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}