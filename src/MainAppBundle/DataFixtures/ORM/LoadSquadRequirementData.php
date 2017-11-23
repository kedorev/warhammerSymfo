<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 13/07/2017
 * Time: 14:01
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\squadRequirement;

class LoadSquadRequirementData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $squadRequirementsDatas = array(
            "0" => array(
                'name' => 'crisis_shashui_into_crisis',
                'min' => '3',
                'max' => '9',
                'model' => 'Crisis sha\'shui',
                'squad' => 'XV8 crisis',
            ),
            "1" => array(
                'name' => 'crisis_shavre_into_crisis',
                'min' => '0',
                'max' => '1',
                'model' => "Crisis sha'vre",
                'squad' => 'XV8 crisis',
            ),
            "2" => array(
                'name' => 'fire_warrior_into_strike_team',
                'min' => '5',
                'max' => '12',
                'model' => "Fire warrior",
                'squad' => 'Strike team',
            ),
            "3" => array(
                'name' => 'fire_shasui_into_strike_team',
                'min' => '0',
                'max' => '1',
                'model' => "Fire warrior sha'shui",
                'squad' => 'Strike team',
            ),
        );


        foreach ($squadRequirementsDatas as $squadRequirementsData) {
            $requirement = new squadRequirement();
            $requirement->setMin($squadRequirementsData['min']);
            $requirement->setMax($squadRequirementsData['max']);
            $requirement->setName($squadRequirementsData['name']);
            $requirement->setModel($this->getReference($squadRequirementsData['model']));
            $requirement->setSquad($this->getReference($squadRequirementsData['squad']));

            $manager->persist($requirement);
            $manager->flush();

            $this->addReference($requirement->getName(), $requirement);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 20;
    }
}