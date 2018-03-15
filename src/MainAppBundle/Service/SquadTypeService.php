<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 15/03/2018
 * Time: 09:55
 */

namespace MainAppBundle\Service;


use MainAppBundle\Entity\SquadType;

class SquadTypeService extends baseService
{
   public function getAllOrderByShowOrder()
   {
       return $this->em->getRepository(SquadType::class)->getAllSquadTypeOrderByShow();
   }
}