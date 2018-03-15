<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 28/02/2018
 * Time: 16:25
 */

namespace MainAppBundle\Service;


use MainAppBundle\Entity\FormationEntity;
use MainAppBundle\Entity\SquadType;

class FormationEntityService extends baseService
{
    public function getSquadByType(SquadType $type, FormationEntity $formationEntity)
    {
        $result = array();
        foreach ($formationEntity->getSquadsEntity() as $squadEntity)
        {
            if($squadEntity->getSquadModel()->getType() == $type)
            {
                array_push($result, $squadEntity);
            }
        }
        return $result;
    }
}