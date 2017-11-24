<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 19/06/2017
 * Time: 10:10
 */


// src/AppBundle/DataFixtures/ORM/LoadUserData.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Weapon;

class LoadWeaponData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $weapons = array(
            '0' => array(
                'name' => "Fusil a impulsion",
                'AP' => 0,
                'dommage' => 1,
                'reach' => 30,
                'S' => 5,
                'type' => "tir rapide",
                'price' => 0,
                'rules' => ""
            ),
            '1' => array(
                'name' => "Fusil a plasma",
                'AP' => -1,
                'dommage' => 1,
                'reach' => 24,
                'S' => 6,
                'type' => "tir rapide",
                'price' => 11,
                'rules' => ""
            ),
        );

        foreach($weapons as $weaponData)
        {
            $weapon = new Weapon();
            $weapon->setName($weaponData['name']);
            $weapon->setArmorPenetration($weaponData['AP']);
            $weapon->setDommage($weaponData['dommage']);
            $weapon->setReach($weaponData['reach']);
            $weapon->setStrength($weaponData['S']);
            $weapon->setType($weaponData['type']);
            $weapon->setPrice($weaponData['price']);
            $weapon->setRule($weaponData['rules']);


            $manager->persist($weapon);
            $manager->flush();

            $this->addReference($weapon->getName(), $weapon);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}