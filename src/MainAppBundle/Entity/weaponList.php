<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * weaponList
 *
 * @ORM\Table(name="weapon_list")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\weaponListRepository")
 */
class weaponList
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
     * @var array(Weapon)
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Weapon", mappedBy="weaponLists" )
     */
    private $weapons;

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
     * @return weaponList
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
     * Constructor
     */
    public function __construct()
    {
        $this->weapons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add weapon
     *
     * @param \MainAppBundle\Entity\Weapon $weapon
     *
     * @return weaponList
     */
    public function addWeapon(\MainAppBundle\Entity\Weapon $weapon)
    {
        $this->weapons[] = $weapon;
        $weapon->addWeaponList($this);

        return $this;
    }

    /**
     * Remove weapon
     *
     * @param \MainAppBundle\Entity\Weapon $weapon
     */
    public function removeWeapon(\MainAppBundle\Entity\Weapon $weapon)
    {
        $this->weapons->removeElement($weapon);
    }

    /**
     * Get weapons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeapons()
    {
        return $this->weapons;
    }
}
