<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\FormationEntity",mappedBy="formationModel")
     */
    private $formationEntities;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\FormationRequirement", mappedBy="formation")
     */
    private $formationRequirements;

    /**
     * @ORM\Column(name="command_point", type="integer")
     */
    private $commandPoint;




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
     * @return Formation
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
        $this->formationRequirements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add formationRequirement
     *
     * @param \MainAppBundle\Entity\FormationRequirement $formationRequirement
     *
     * @return Formation
     */
    public function addFormationRequirement(\MainAppBundle\Entity\FormationRequirement $formationRequirement)
    {
        $this->formationRequirements[] = $formationRequirement;

        return $this;
    }

    /**
     * Remove formationRequirement
     *
     * @param \MainAppBundle\Entity\FormationRequirement $formationRequirement
     */
    public function removeFormationRequirement(\MainAppBundle\Entity\FormationRequirement $formationRequirement)
    {
        $this->formationRequirements->removeElement($formationRequirement);
    }

    /**
     * Get formationRequirements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormationRequirements()
    {
        return $this->formationRequirements;
    }

    /**
     * Add formationEntity
     *
     * @param \MainAppBundle\Entity\FormationEntity $formationEntity
     *
     * @return Formation
     */
    public function addFormationEntity(\MainAppBundle\Entity\FormationEntity $formationEntity)
    {
        $this->formationEntities[] = $formationEntity;

        return $this;
    }

    /**
     * Remove formationEntity
     *
     * @param \MainAppBundle\Entity\FormationEntity $formationEntity
     */
    public function removeFormationEntity(\MainAppBundle\Entity\FormationEntity $formationEntity)
    {
        $this->formationEntities->removeElement($formationEntity);
    }

    /**
     * Get formationEntities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormationEntities()
    {
        return $this->formationEntities;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set commandPoint
     *
     * @param integer $commandPoint
     *
     * @return Formation
     */
    public function setCommandPoint( $commandPoint)
    {
        $this->commandPoint = $commandPoint;

        return $this;
    }

    /**
     * Get commandPoint
     *
     * @return integer
     */
    public function getCommandPoint()
    {
        return $this->commandPoint;
    }


    public function getRequirementForOneSquadType(SquadType $squadType)
    {
        foreach ($this->formationRequirements as $formationRequirement)
        {
            if($formationRequirement->getSquadType() == $squadType)
            {
                return $formationRequirement;
            }
        }
        return false;
    }
}
