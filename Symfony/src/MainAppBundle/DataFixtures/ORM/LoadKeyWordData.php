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
use MainAppBundle\Entity\KeyWord;

class LoadKeyWordData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $index = 0;
        $keyWords = array(
            "Drone",
            "Vol",
            "Battlesuit"
        );

        foreach($keyWords as $keyWordName)
        {
            $keyWord = new KeyWord();
            $keyWord->setName($keyWordName);

            $manager->persist($keyWord);
            $manager->flush();

            $this->addReference($keyWord->getName(), $keyWord);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}