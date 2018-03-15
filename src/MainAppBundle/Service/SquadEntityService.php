<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 28/02/2018
 * Time: 13:50
 */

namespace MainAppBundle\Service;


use Doctrine\ORM\EntityManagerInterface;
use MainAppBundle\Entity\SquadsEntity;

class SquadEntityService extends baseService
{

    private $modelEntityService;



    /**
     * ModelEntityService constructor.
     * @param weaponEntityService $weaponEntityService
     */
    public function __construct(EntityManagerInterface $entityManager,ModelEntityService $modelEntityService)
    {
        parent::__construct($entityManager);
        $this->modelEntityService = $modelEntityService;
    }

    public function duplicate(SquadsEntity $squadsEntity): SquadsEntity
    {
        $newSquad = new SquadsEntity();


        $newSquad->setFormation($squadsEntity->getFormation());
        $newSquad->setSquadModel($squadsEntity->getSquadModel());
        foreach ($squadsEntity->getModelsEntity() as $modelEntity)
        {
            $newSquad->addModelsEntity($this->modelEntityService->duplicate($modelEntity, $newSquad));
        }

        $this->em->persist($newSquad);
        $this->em->flush();
        return $newSquad;
    }
}