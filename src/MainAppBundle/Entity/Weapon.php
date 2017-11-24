<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Weapon
 *
 * @ORM\Table(name="weapon")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\WeaponRepository")
 */
class Weapon
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="reach", type="integer")
     */
    private $reach;

    /**
     * @var int
     *
     * @ORM\Column(name="Strength", type="integer")
     */
    private $strength;

    /**
     * @var int
     *
     * @ORM\Column(name="Dommage", type="integer")
     */
    private $dommage;

    /**
     * @var int
     *
     * @ORM\Column(name="armorPenetration", type="integer")
     */
    private $armorPenetration;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var array(weaponList)
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\weaponList", inversedBy="weapons")
     */
    private $weaponLists;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Weapons_Model",mappedBy="weapon")
     */
    private $weapons_model;

    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\weaponEntity",mappedBy="weaponModel")
     */
    private $weaponsEntity;

    /**
     * @var string
     *
     * @ORM\Column(name="rule", type="text")
     */
    private $rule;

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
     * Set name
     *
     * @param string $name
     *
     * @return Weapon
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set reach
     *
     * @param integer $reach
     *
     * @return Weapon
     */
    public function setReach($reach)
    {
        $this->reach = $reach;

        return $this;
    }

    /**
     * Get reach
     *
     * @return int
     */
    public function getReach()
    {
        return $this->reach;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     *
     * @return Weapon
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set armorPenetration
     *
     * @param integer $armorPenetration
     *
     * @return Weapon
     */
    public function setArmorPenetration($armorPenetration)
    {
        $this->armorPenetration = $armorPenetration;

        return $this;
    }

    /**
     * Get armorPenetration
     *
     * @return int
     */
    public function getArmorPenetration()
    {
        return $this->armorPenetration;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Weapon
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dommage
     *
     * @param integer $dommage
     *
     * @return Weapon
     */
    public function setDommage($dommage)
    {
        $this->dommage = $dommage;

        return $this;
    }

    /**
     * Get dommage
     *
     * @return integer
     */
    public function getDommage()
    {
        return $this->dommage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->weaponLists = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add weaponList
     *
     * @param \MainAppBundle\Entity\weaponList $weaponList
     *
     * @return Weapon
     */
    public function addWeaponList(\MainAppBundle\Entity\weaponList $weaponList)
    {
        $this->weaponLists[] = $weaponList;

        return $this;
    }

    /**
     * Remove weaponList
     *
     * @param \MainAppBundle\Entity\weaponList $weaponList
     */
    public function removeWeaponList(\MainAppBundle\Entity\weaponList $weaponList)
    {
        $this->weaponLists->removeElement($weaponList);
    }

    /**
     * Get weaponLists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeaponLists()
    {
        return $this->weaponLists;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Weapon
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set weaponSwitch
     *
     * @param \MainAppBundle\Entity\weaponList $weaponSwitch
     *
     * @return Weapon
     */
    public function setWeaponSwitch(\MainAppBundle\Entity\weaponList $weaponSwitch = null)
    {
        $this->weaponSwitch = $weaponSwitch;

        return $this;
    }

    /**
     * Get weaponSwitch
     *
     * @return \MainAppBundle\Entity\weaponList
     */
    public function getWeaponSwitch()
    {
        return $this->weaponSwitch;
    }

    /**
     * Set rule
     *
     * @param string $rule
     *
     * @return Weapon
     */
    public function setRule($rule)
    {
        $this->rule = $rule;

        return $this;
    }

    /**
     * Get rule
     *
     * @return string
     */
    public function getRule()
    {
        return $this->rule;
    }

    public function __toString():string
    {
        return $this->getName();
    }

    /**
     * Add weaponsEntity
     *
     * @param \MainAppBundle\Entity\weaponEntity $weaponsEntity
     *
     * @return Weapon
     */
    public function addWeaponsEntity(\MainAppBundle\Entity\weaponEntity $weaponsEntity)
    {
        $this->weaponsEntity[] = $weaponsEntity;

        return $this;
    }

    /**
     * Remove weaponsEntity
     *
     * @param \MainAppBundle\Entity\weaponEntity $weaponsEntity
     */
    public function removeWeaponsEntity(\MainAppBundle\Entity\weaponEntity $weaponsEntity)
    {
        $this->weaponsEntity->removeElement($weaponsEntity);
    }

    /**
     * Get weaponsEntity
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeaponsEntity()
    {
        return $this->weaponsEntity;
    }

    /**
     * Add weaponsModel
     *
     * @param \MainAppBundle\Entity\Weapons_Model $weaponsModel
     *
     * @return Weapon
     */
    public function addWeaponsModel(\MainAppBundle\Entity\Weapons_Model $weaponsModel)
    {
        $this->weapons_model[] = $weaponsModel;

        return $this;
    }

    /**
     * Remove weaponsModel
     *
     * @param \MainAppBundle\Entity\Weapons_Model $weaponsModel
     */
    public function removeWeaponsModel(\MainAppBundle\Entity\Weapons_Model $weaponsModel)
    {
        $this->weapons_model->removeElement($weaponsModel);
    }

    /**
     * Get weaponsModel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeaponsModel()
    {
        return $this->weapons_model;
    }
}
