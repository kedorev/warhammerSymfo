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
use MainAppBundle\Entity\PsychicCategory;

class LoadPsychicCategoryData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $psyDatas = array(
            '0' => array(
                'name' => 'Smites',
            ),
            '1' => array(
                'name' => 'Tyranids Psy',
            ),
        );


        foreach($psyDatas as $psyData)
        {
            $cat = new PsychicCategory();
            $cat->setName($psyData['name']);

            $manager->persist($cat);
            $manager->flush();

            $this->addReference($cat->getName(), $cat);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}