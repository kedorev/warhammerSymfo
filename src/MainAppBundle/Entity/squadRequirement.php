<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Tests\Model;

/**
 * squadRequirement
 *
 * @ORM\Table(name="squad_requirement")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\squadRequirementRepository")
 */
class squadRequirement
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
     * @var Squad
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Squad", inversedBy="squadRequirements")
     */
    private $squad;

    /**
     * @var int
     *
     * @ORM\Column(name="min", type="integer")
     */
    private $min;

    /**
     * @var string
     *
     * @ORM\Column(name="max", type="string", length=255)
     */
    private $max;


    /**
     * @var Models
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Models", inversedBy="requirementSquad")
     */
    private $model;


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
     * Set min
     *
     * @param integer $min
     *
     * @return squadRequirement
     */
    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get min
     *
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set max
     *
     * 0@param string $max
     *
     * @return squadRequirement
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get max
     *
     * @return string
     */
    public function getMax()
    {
        return $this->max;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
    }


    /**
     * Get model
     *
     * @return \MainAppBundle\Entity\Models
     */
    public function getModel(): Models
    {
        return $this->model;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return squadRequirement
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
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * Set squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     *
     * @return squadRequirement
     */
    public function setSquad(\MainAppBundle\Entity\Squad $squad = null)
    {
        $this->squad = $squad;

        return $this;
    }

    /**
     * Get squad
     *
     * @return \MainAppBundle\Entity\Squad
     */
    public function getSquad(): Squad
    {
        return $this->squad;
    }

    /**
     * Set model
     *
     * @param \MainAppBundle\Entity\Models $model
     *
     * @return squadRequirement
     */
    public function setModel(\MainAppBundle\Entity\Models $model = null)
    {
        $this->model = $model;

        return $this;
    }
}
