<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 22/03/2018
 * Time: 08:59
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\SubFaction;

class LoadSubFactionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $subFactionsData = array(
            '0' => array(
                'name' => "T'au sept",
                'rules' => 'Overwatch on 5+',
                'faction' => 'Tau',
            ),
            '1' => array(
                'name' => "Bork'an sept",
                'rules' => '+6" for heavy and rapid fire weapon',
                'faction' => 'Tau',
            ),

        );


        foreach($subFactionsData as $subFactionData)
        {
            $subFaction = new SubFaction();
            $subFaction->setName($subFactionData['name']);
            $subFaction->setRules($subFactionData['rules']);
            $subFaction->setFaction($this->getReference($subFactionData['faction']));

            $manager->persist($subFaction);
            $manager->flush();

            $this->addReference($subFaction->getName(), $subFaction);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}