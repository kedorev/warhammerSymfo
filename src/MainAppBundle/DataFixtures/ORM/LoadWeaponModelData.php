<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 10/11/2017
 * Time: 16:11
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Weapon;
use MainAppBundle\Entity\Models;
use MainAppBundle\Entity\Profil;
use MainAppBundle\Entity\Weapons_Model;


class LoadWeaponModelData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $modelsData = array(
            "0" => array(
                'Model' => "Crisis sha'shui",
                "Weapon" => 'Fusil a plasma',
                "Number" => 4


            ),
        );


        foreach($modelsData as $modelData)
        {
            $model = new Weapons_Model();
            $model->setCount($modelData['Number']);
            $model->setModel($this->getReference($modelData['Model']));
            $model->setWeapon($this->getReference($modelData['Weapon']));


            $manager->persist($model);
            $manager->flush();

        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 20;
    }
}