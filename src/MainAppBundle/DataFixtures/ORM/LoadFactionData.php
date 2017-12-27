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
use MainAppBundle\Entity\Faction;

class LoadFactionData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $keyWords = array(
            '0' => array(
                "name" => "Tau",
                "type" => "Xenos",
            ),
            '1' => array(
                "name" => "Necron",
                "type" => "Xenos",
            ),
            '2' => array(
                "name" => "Tyranide",
                "type" => "Xenos",
            ),
            '3' => array(
                "name" => "Eldar",
                "type" => "Xenos",
            ),
            '4' => array(
                "name" => "Space Marine",
                "type" => "Imperium",
            ),
            '5' => array(
                "name" => "Garde Imperial",
                "type" => "Imperium",
            ),
            '6' => array(
                "name" => "Eldar Noir",
                "type" => "Xenos",
            ),
            '7' => array(
                "name" => "Demons",
                "type" => "Chaos",
            ),
            '8' => array(
                "name" => "Space marine du chaos",
                "type" => "Chaos",
            ),
            '9' => array(
                "name" => "Thousand Sun",
                "type" => "Chaos",
            ),
            '10' => array(
                "name" => "Blood Angel",
                "type" => "Imperium",
            ),
        );

        foreach($keyWords as $factionData)
        {
            $faction = new Faction();
            $faction->setName($factionData["name"]);
            $faction->setType($factionData["type"]);

            $manager->persist($faction);
            $manager->flush();

            $this->addReference($faction->getName(), $faction);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}