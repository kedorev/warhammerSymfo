<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 28/02/2018
 * Time: 11:34
 */

namespace MainAppBundle\Service;


use MainAppBundle\Entity\weaponEntity;

class weaponEntityService extends baseService
{

    public function duplicate(weaponEntity $weaponEntity): weaponEntity
    {
        $newWeapon = new weaponEntity();
        $newWeapon->setWeaponModel($weaponEntity->getWeaponModel());
        $this->em->persist($newWeapon);
        $this->em->flush();
        return $newWeapon;
    }

}