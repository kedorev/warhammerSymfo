<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 10/07/2017
 * Time: 14:29
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\FactionType;

class LoadFactionTypeData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $keyWords = array(
            '0' => array(
                "name" => "Xenos",
            ),
            '1' => array(
                "name" => "Imperium",
            ),
            '2' => array(
                "name" => "Chaos",
            ),
        );

        foreach($keyWords as $factionData)
        {
            $faction = new FactionType();
            $faction->setName($factionData["name"]);

            $manager->persist($faction);
            $manager->flush();

            $this->addReference($faction->getName(), $faction);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}