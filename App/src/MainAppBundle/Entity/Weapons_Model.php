<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Weapons_Model
 *
 * @ORM\Table(name="weapons__model")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\Weapons_ModelRepository")
 */
class Weapons_Model
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
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Models", inversedBy="weapons")
     */
    private $model;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Weapon", inversedBy="weapons_model")
     */
    private $weapon;


    /**
     * @var
     * @ORM\Column(type="integer", name="count")
     */
    private $count;

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
     * Set count
     *
     * @param integer $count
     *
     * @return Weapons_Model
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set model
     *
     * @param \MainAppBundle\Entity\Models $model
     *
     * @return Weapons_Model
     */
    public function setModel(\MainAppBundle\Entity\Models $model = null)
    {
        $this->model = $model;
        $model->addWeapon($this);

        return $this;
    }

    /**
     * Get model
     *
     * @return \MainAppBundle\Entity\Models
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set weapon
     *
     * @param \MainAppBundle\Entity\Weapon $weapon
     *
     * @return Weapons_Model
     */
    public function setWeapon(\MainAppBundle\Entity\Weapon $weapon = null)
    {
        $this->weapon = $weapon;

        return $this;
    }

    /**
     * Get weapon
     *
     * @return \MainAppBundle\Entity\Weapon
     */
    public function getWeapon()
    {
        return $this->weapon;
    }
}
