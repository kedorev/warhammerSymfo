<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * weaponEntity
 *
 * @ORM\Table(name="weapon_entity")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\weaponEntityRepository")
 */
class weaponEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\ModelEntity", inversedBy="weaponsEntity" ,cascade={"persist"})
     */
    private $modelEntity;

    /**
     * @var Squad
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Weapon", inversedBy="weaponsEntity")
     */
    private $weaponModel;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set weaponModel
     *
     * @param \MainAppBundle\Entity\Weapon $weaponModel
     *
     * @return weaponEntity
     */
    public function setWeaponModel(\MainAppBundle\Entity\Weapon $weaponModel = null)
    {
        $this->weaponModel = $weaponModel;

        return $this;
    }

    /**
     * Get weaponModel
     *
     * @return \MainAppBundle\Entity\Weapon
     */
    public function getWeaponModel()
    {
        return $this->weaponModel;
    }

    /**
     * Set modelEntity
     *
     * @param \MainAppBundle\Entity\ModelEntity $modelEntity
     *
     * @return weaponEntity
     */
    public function setModelEntity(\MainAppBundle\Entity\ModelEntity $modelEntity = null)
    {
        $this->modelEntity = $modelEntity;
        $modelEntity->addWeaponsEntity($this);

        return $this;
    }

    /**
     * Get modelEntity
     *
     * @return \MainAppBundle\Entity\ModelEntity
     */
    public function getModelEntity()
    {
        return $this->modelEntity;
    }

    public function __toString()
    {
        return $this->getWeaponModel()->getName();
    }
}
