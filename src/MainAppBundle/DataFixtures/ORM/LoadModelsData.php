<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 19/06/2017
 * Time: 10:38
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Faction;
use MainAppBundle\Entity\Models;
use MainAppBundle\Entity\Profil;

class LoadModelsData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $modelsData = array(
            "0" => array(
                'Name' => "Fire warrior",
                'Wound' => 1,
                'Save' => 4,
                'Point' => 8,
                'Toughness' => 3,
                'Ld' => 6,
                'PP' => 4,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 3,
                        'A' => 1,
                        'M' => 6,
                        'min' => 1,
                        'max' => 1,
                    ),
                ),
                'keyword' => array(

                ),
                'faction' => array(
                    '0' => 'Tau',
                ),
                'abilities' => array(

                ),
            ), "1" => array(
                'Name' => "Fire warrior sha'shui",
                'Wound' => 1,
                'Save' => 4,
                'Point' => 8,
                'Toughness' => 3,
                'Ld' => 7,
                'PP' => 4,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 3,
                        'A' => 2,
                        'M' => 6,
                        'min' => 1,
                        'max' => 1,
                    ),
                ),
                'keyword' => array(

                ),
                'faction' => array(
                    '0' => 'Tau',
                ),
                'abilities' => array(

                ),
            ),
            "2" => array(
                'Name' => "Crisis sha'shui",
                'Wound' => 3,
                'Save' => 3,
                'Point' => 42,
                'Toughness' => 5,
                'Ld' => 7,
                'PP' => 4,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 5,
                        'A' => 2,
                        'M' => 8,
                        'min' => 1,
                        'max' => 3,
                    )
                ),
                'keyword' => array(
                    '0' => "Vol",
                    '1' => "Battlesuit",
                ),
                'faction' => array(
                    '0' => 'Tau',
                ),
                'abilities' => array(
                    '0' => 'Manta Strike',
                ),
            ),
            "3" => array(
                'Name' => "Crisis sha'vre",
                'Wound' => 3,
                'Save' => 3,
                'Point' => 42,
                'Toughness' => 5,
                'Ld' => 8,
                'PP' => 4,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 5,
                        'A' => 3,
                        'M' => 8,
                        'min' => 1,
                        'max' => 3,
                    )
                ),
                'keyword' => array(
                    '0' => "Vol",
                    '1' => "Battlesuit",
                ),
                'faction' => array(
                    '0' => 'Tau',
                ),
                'abilities' => array(
                    '0' => 'Manta Strike',
                ),
            ),
        );


        foreach($modelsData as $modelData)
        {
            $model = new Models();
            $model->setName($modelData['Name']);
            $model->setWound($modelData['Wound']);
            $model->setSave($modelData['Save']);
            $model->setPoint($modelData['Point']);
            $model->setToughness($modelData['Toughness']);
            $model->setLeadership($modelData['Ld']);
            $model->setPower($modelData['PP']);
            $model->setNbPsychicPower(0);
            $profilsData = $modelData['profil'];
            foreach($profilsData as $profilData)
            {
                $profil = new Profil();
                $profil->setAttack($profilData['A']);
                $profil->setBS($profilData['CC']);
                $profil->setMinWound($profilData['min']);
                $profil->setMaxWound($profilData['max']);
                $profil->setMove($profilData['M']);
                $profil->setWS($profilData['CT']);
                $profil->setStrength($profilData['F']);
                $model->addProfil($profil);
                $manager->persist($profil);
            }
            $factionKeywords = $modelData['faction'];
            foreach($factionKeywords as $faction)
            {
                $model->addFactionKeyWord($this->getReference($faction));
            }
            $Keywords = $modelData['keyword'];
            foreach($Keywords as $keyword)
            {
                $model->addKeysWord($this->getReference($keyword));
            }
            $Abilities = $modelData['abilities'];
            foreach($Abilities as $ability)
            {
                $model->addAbility($this->getReference($ability));
            }

/*
            foreach($modelData['weapon'] as $weapon)
            {
                $model->addWeapon($this->getReference($weapon));
            }*/
            $manager->persist($model);
            $manager->flush();

            $this->addReference($model->getName(), $model);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 10;
    }
}