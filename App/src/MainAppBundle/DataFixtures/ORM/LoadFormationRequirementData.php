<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 17/07/2017
 * Time: 17:15
 */


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\FormationRequirement;

class LoadFormationRequirementData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $FormationsRequirementsData = array(
            "0" => array(
                "min" => '2',
                'max' => '3',
                'type' => 'HQ',
                'formation' => 'Bataillon',
            ),
            "1" => array(
                "min" => '3',
                'max' => '6',
                'type' => 'Troups',
                'formation' => 'Bataillon',
            ),
            "2" => array(
                "min" => '0',
                'max' => '3',
                'type' => 'Elites',
                'formation' => 'Bataillon',
            ),
            "3" => array(
                "min" => '0',
                'max' => '3',
                'type' => 'Fast Attack',
                'formation' => 'Bataillon',
            ),
            "4" => array(
                "min" => '0',
                'max' => '3',
                'type' => 'Heavy Support',
                'formation' => 'Bataillon',
            ),
        );


        foreach($FormationsRequirementsData as $FormationsRequirementData)
        {
            $formation = new FormationRequirement();
            $formation->setMax($FormationsRequirementData['max']);
            $formation->setMin($FormationsRequirementData['min']);
            $formation->setFormation($this->getReference($FormationsRequirementData['formation']));
            $formation->setSquadType($this->getReference($FormationsRequirementData['type']));

            $manager->persist($formation);
            $manager->flush();

            $this->addReference($FormationsRequirementData['formation'] . "_" . $FormationsRequirementData['type']  , $formation);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 10;
    }
}