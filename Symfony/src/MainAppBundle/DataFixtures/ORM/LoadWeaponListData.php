<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 13/11/2017
 * Time: 15:22
 */

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\weaponList;


class LoadWeaponListData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $modelsData = array(
            "0" => array(
                'Name' => "Crisis",
                'Weapons' => array(
                    "0" => "Fusil a plasma",
                    "1" => "Eclateur a fusion",
                )
            ),
        );


        foreach ($modelsData as $modelData) {
            $list = new weaponList();
            $list->setName($modelData['Name']);


            $manager->persist($list);
            $manager->flush();

        }
    }

    public
    function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 20;
    }
}