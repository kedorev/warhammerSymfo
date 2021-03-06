<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 13/07/2017
 * Time: 13:45
 */


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\SquadType;

class LoadSquadTypeData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $modelsData = array(
            "0" => array(
                "name"=>"HQ",
                "img" => "img/QG.png",
                "order" => 1
            ),
            "1" => array(
                "name"=>"Troups",
                "img" => "",
                "order" => 2
            ),
            "2" => array(
                "name"=>"Elites",
                "img" => "",
                "order" => 3
            ),
            "3" => array(
                "name"=>"Fast Attack",
                "img" => "",
                "order" => 4
            ),
            "4" => array(
                "name"=>"Heavy Support",
                "img" => "",
                "order" => 5
            ),
            "5" => array(
                "name"=>"Dedicated Transport",
                "img" => "",
                "order" => 6
            ),
            "6" => array(
                "name"=>"Flyer",
                "img" => "",
                "order" => 7
            ),
            "7" => array(
                "name"=>"Fortification",
                "img" => "",
                "order" => 8
            ),
            "8" => array(
                "name"=>"Lord of war",
                "img" => "",
                "order" => 9
            ),
        );


        foreach($modelsData as $modelData)
        {
            $squadtype = new SquadType();
            $squadtype->setName($modelData['name']);
            $squadtype->setImage($modelData['img']);
            $squadtype->setShowOrder($modelData['order']);

            $manager->persist($squadtype);
            $manager->flush();

            $this->addReference($squadtype->getName(), $squadtype);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}