<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 17/07/2017
 * Time: 17:12
 */


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Formation;
use MainAppBundle\Entity\FormationRequirement;

class LoadFormationData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $modelsData = array(
            '0' => array(
                'name' => "Brigade",
                'CP' => 6
            ),
            '1' => array(
                'name' => "Patrouille",
                'CP' => 3
            ),
            '2' => array(
                'name' => "Bataillon",
                'CP' => 3
            ),
        );


        foreach($modelsData as $modelData)
        {
            $formation = new Formation();
            $formation->setName($modelData['name']);
            $formation->setCommandPoint($modelData['CP']);

            $manager->persist($formation);
            $manager->flush();

            $this->addReference($formation->getName(), $formation);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}