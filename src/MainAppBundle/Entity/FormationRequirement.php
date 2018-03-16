<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormationRequirement
 *
 * @ORM\Table(name="formation_requirement")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\FormationRequirementRepository")
 */
class FormationRequirement
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
     * @var Formation
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Formation", inversedBy="formationRequirements")
     */
    private $formation;

    /**
     * @var Formation
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\SquadType", inversedBy="formationRequirements")
     */
    private $SquadType;

    /**
     * @var int
     *
     * @ORM\Column(name="min", type="integer")
     */
    private $min;

    /**
     * @var int
     *
     * @ORM\Column(name="max", type="integer")
     */
    private $max;


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
     * @return FormationRequirement
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
     * @param integer $max
     *
     * @return FormationRequirement
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get max
     *
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set formation
     *
     * @param \MainAppBundle\Entity\Formation $formation
     *
     * @return FormationRequirement
     */
    public function setFormation(\MainAppBundle\Entity\Formation $formation = null)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \MainAppBundle\Entity\Formation
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set squadType
     *
     * @param \MainAppBundle\Entity\SquadType $squadType
     *
     * @return FormationRequirement
     */
    public function setSquadType(\MainAppBundle\Entity\SquadType $squadType = null)
    {
        $this->SquadType = $squadType;

        return $this;
    }

    /**
     * Get squadType
     *
     * @return \MainAppBundle\Entity\SquadType
     */
    public function getSquadType()
    {
        return $this->SquadType;
    }


    public function getName()
    {
        return $this->getFormation().'_'.$this->getSquadType();
    }


}
