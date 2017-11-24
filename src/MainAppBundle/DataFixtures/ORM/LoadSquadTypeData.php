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
            "Elite",
            'Attaque Rapide',
            'QG',
            'Soutient',
            'Troupe'
        );


        foreach($modelsData as $modelData)
        {
            $squadtype = new SquadType();
            $squadtype->setName($modelData);

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