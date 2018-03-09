<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 31/08/17
 * Time: 12:22
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Faction;
use MainAppBundle\Entity\FormationEntity;

class LoadFormationEntityData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $formationsEntityData = array(
            '0' => array(
                'formation' => "Patrouille",

            ),

        );


        foreach($formationsEntityData as $formationEntityData)
        {
            $formationEntity = new FormationEntity();
            $formationEntity->setFormationModel($this->getReference($formationEntityData['formation']));


            $manager->persist($formationEntity);
            $manager->flush();

            $this->addReference($formationEntityData['formation']."A", $formationEntity);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 15;
    }
}