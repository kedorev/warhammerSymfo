<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 18/05/2017
 * Time: 11:42
 */

// src/AppBundle/DataFixtures/ORM/LoadUserData.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Abilities;

class LoadAbilitiesData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $abilitiesData = array(
            '0' => array(
                'name' => "Saviour Protocols",
                'description' => 'If a drones unit within 3" of a friendly',
            ),
            '1' => array(
                'name' => "Manta Strike",
                'description' => 'placer la figurine a 9"+',
            ),
            '2' => array(
                'name' => "Field generator (4+)",
                'description' => 'has a 4+ invunerable save',
            ),
            '3' => array(
                'name' => "Failure is not an option",
                'description' => "T'au empire units within 6\" of a friendly ETHEREAL may use the Ethereal's Leadership characteristic without their own"
            )

        );


        foreach($abilitiesData as $abilitieData)
        {
            $abilities = new Abilities();
            $abilities->setName($abilitieData['name']);
            $abilities->setDescription($abilitieData['description']);

            $manager->persist($abilities);
            $manager->flush();

            $this->addReference($abilities->getName(), $abilities);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}