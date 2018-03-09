<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 13/11/2017
 * Time: 17:06
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Visibility;

class LoadVisibilityData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $visibilitiesData = array(
            '0' => "Everybody",
            '1' => 'Friend only',
            '2' => 'Only me'
        );

        foreach($visibilitiesData as $visibilitysData)
        {
            $visibility = new Visibility();
            $visibility->setName($visibilitysData);


            $manager->persist($visibility);

            $this->addReference($visibility->getName(), $visibility);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}