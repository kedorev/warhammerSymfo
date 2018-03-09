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
                'Point' => 8,
                'PP' => 4,
                'psyOwned' => 0,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 3,
                        'A' => 1,
                        'M' => 6,
                        'min' => 1,
                        'max' => 1,
                        'Toughness' => 3,
                        'Ld' => 6,
                        'Save' => 4,
                    ),
                ),
                'keyword' => array(

                ),
                'faction' => array(
                    '0' => 'Tau',
                ),
                'abilities' => array(

                ),
                'psy' => array(

                ),
            ), "1" => array(
                'Name' => "Fire warrior sha'shui",
                'Wound' => 1,
                'Point' => 8,
                'PP' => 4,
                'psyOwned' => 0,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 3,
                        'A' => 2,
                        'M' => 6,
                        'min' => 1,
                        'max' => 1,
                        'Toughness' => 3,
                        'Ld' => 7,
                        'Save' => 4,
                    ),
                ),
                'keyword' => array(

                ),
                'faction' => array(
                    '0' => 'Tau',
                ),
                'abilities' => array(

                ),
                'psy' => array(

                ),
            ),
            "2" => array(
                'Name' => "Crisis sha'shui",
                'Wound' => 3,
                'Point' => 42,
                'PP' => 4,
                'psyOwned' => 0,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 5,
                        'A' => 2,
                        'M' => 8,
                        'min' => 1,
                        'max' => 3,
                        'Toughness' => 5,
                        'Ld' => 7,
                        'Save' => 3,
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
                'psy' => array(

                ),
            ),
            "3" => array(
                'Name' => "Crisis sha'vre",
                'Wound' => 3,
                'Point' => 42,
                'PP' => 4,
                'psyOwned' => 0,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 5,
                        'A' => 3,
                        'M' => 8,
                        'Toughness' => 5,
                        'Ld' => 8,
                        'min' => 1,
                        'max' => 3,
                        'Save' => 3,
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
                'psy' => array(

                ),
            ),
            "4" => array(
                'Name' => "Neurotrope",
                'Wound' => 3,
                'Point' => 80,
                'PP' => 4,
                'psyOwned' => 2,
                'profil' => array(
                    '0' => array(
                        'CC' => 5,
                        'CT' => 4,
                        'F' => 5,
                        'A' => 3,
                        'M' => 8,
                        'Toughness' => 5,
                        'Ld' => 8,
                        'min' => 1,
                        'max' => 3,
                        'Save' => 3,
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
                'psy' => array(
                    '0' => 'Smites',
                    '1' => 'Tyranids'
                ),
            ),
        );


        foreach($modelsData as $modelData)
        {
            $model = new Models();
            $model->setName($modelData['Name']);
            $model->setWound($modelData['Wound']);
            $model->setPoint($modelData['Point']);
            $model->setPower($modelData['PP']);
            $model->setNbPsychicPower($modelData['psyOwned']);
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
                $profil->setToughness($profilData['Toughness']);
                $profil->setSave($profilData['Save']);
                $profil->setLeadership($profilData['Ld']);
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
            $psychics = $modelData['psy'];
            foreach($psychics as $psy)
            {
                $model->addPsychicCategoryAvailable($this->getReference($psy));
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