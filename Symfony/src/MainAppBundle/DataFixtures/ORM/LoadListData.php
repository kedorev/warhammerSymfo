<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 21/07/2017
 * Time: 17:47
 */


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainAppBundle\Entity\Liste;

class LoadListData extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $keyWords = array(
            '0' => array(
                "name" => "Tau test",
                "points" => "1500",
                "artefact" => 0,
                "formation" => array(
                    '0' => 'PatrouilleA',
                ),
                "visibility" => 'Only me',
                "owner" => "user-admin"

            ),
        );

        foreach($keyWords as $factionData)
        {
            $liste = new Liste();
            $liste->setName($factionData["name"]);
            $liste->setPointsLimit($factionData["points"]);
            $liste->setArtefactNumber($factionData["artefact"]);
            $liste->setOwner($this->getReference($factionData["owner"]));
            $liste->setVisibility($this->getReference($factionData["visibility"]));
            foreach ($factionData["formation"] as $formationEntity )
            {
                $liste->addFormationsListe($this->getReference($formationEntity));
            }

            $manager->persist($liste);
            $manager->flush();

            $this->addReference($liste->getName(), $liste);
        }
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 30;
    }
}