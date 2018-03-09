<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 28/02/2018
 * Time: 11:46
 */

namespace MainAppBundle\Service;


use Doctrine\ORM\EntityManagerInterface;
use MainAppBundle\Entity\ModelEntity;

class ModelEntityService extends baseService
{
    /**
     * @var weaponEntityService
     */
    private $weaponEntityService;



    /**
     * ModelEntityService constructor.
     * @param weaponEntityService $weaponEntityService
     */
    public function __construct(EntityManagerInterface $entityManager,weaponEntityService $weaponEntityService)
    {
        parent::__construct($entityManager);
        $this->weaponEntityService = $weaponEntityService;
    }


    public function duplicate(ModelEntity $modelEntity): ModelEntity
    {
        if($modelEntity->getSquadEntity()->isFull())
        {
            throw new \LogicException("Can't duplicate model, squad is full");
        }

        $newModel = new ModelEntity();
        $newModel->setModelTemplate($modelEntity->getModelTemplate());
        $newModel->setSquadEntity($modelEntity->getSquadEntity());

        foreach ($modelEntity->getWeaponsEntity() as $weaponEntity)
        {
            $newModel->addWeaponsEntity($this->weaponEntityService->duplicate($weaponEntity));
        }

        $this->em->persist($newModel);
        $this->em->flush();
        return $newModel;
    }
}

