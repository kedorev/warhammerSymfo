<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 13/07/2017
 * Time: 13:44
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Squad;

class LoadSquadData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $squadsData = array(
            '0' => array(
                'name' => 'XV8 crisis',
                'type' => 'Elite',
                'requirement' => array(
                    '0' => 'crisis_shashui_into_crisis',
                    '1' => 'crisis_shavre_into_crisis',
                ),
                'min' => '3',
                'max' => '9',
            ),
            '1' => array(
                'name' => 'Strike team',
                'type' => 'Troupe',
                'requirement' => array(
                    '0' => 'fire_warrior_into_strike_team',
                ),
                'min' => '5',
                'max' => '12',
            ),
        );


        foreach($squadsData as $squadData)
        {
            $squad = new Squad();
            $squad->setName($squadData['name']);
            $squad->setType($this->getReference($squadData['type']));
            $squad->setMin($squadData['min']);
            $squad->setMax($squadData['max']);

            $manager->persist($squad);
            $manager->flush();

            $this->addReference($squad->getName(), $squad);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 15;
    }
}