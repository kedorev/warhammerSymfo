<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Squad
 *
 * @ORM\Table(name="squad")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\SquadRepository")
 */
class Squad
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
     * @var ArrayCollection
     *
     *@ORM\OneToMany(targetEntity="MainAppBundle\Entity\squadRequirement", mappedBy="squad")
     */
    private $squadRequirements;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * @var faction
     *
     * >@ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Faction", inversedBy="squad")
     */
    private $faction;

    /**
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\SubFaction", inversedBy="squads")
     */
    private $subFaction;


    /**
     * @var SquadType
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\SquadType", inversedBy="squads")
     * @ORM\JoinColumn(name="typeSquadId", referencedColumnName="id")
     */
    private $type;


    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\SquadsEntity",mappedBy="squadModel")
     */
    private $squadEntity;


    public function __construct() {
        $this->squadRequirements = new ArrayCollection();
    }

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
     * @return Squad
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
     * Set type
     *
     * @param \MainAppBundle\Entity\SquadType $type
     *
     * @return Squad
     */
    public function setType(\MainAppBundle\Entity\SquadType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \MainAppBundle\Entity\SquadType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set faction
     *
     * @param \MainAppBundle\Entity\Faction $faction
     *
     * @return Squad
     */
    public function setFaction(\MainAppBundle\Entity\Faction $faction = null)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get faction
     *
     * @return \MainAppBundle\Entity\Faction
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Add squadeRequirement
     *
     * @param \MainAppBundle\Entity\squadRequirement $squadeRequirement
     *
     * @return Squad
     */
    public function addSquadeRequirement(\MainAppBundle\Entity\squadRequirement $squadeRequirement)
    {
        $this->squadRequirements[] = $squadeRequirement;

        return $this;
    }

    /**
     * Remove squadeRequirement
     *
     * @param \MainAppBundle\Entity\squadRequirement $squadeRequirement
     */
    public function removeSquadeRequirement(\MainAppBundle\Entity\squadRequirement $squadeRequirement)
    {
        $this->squadRequirements->removeElement($squadeRequirement);
    }

    /**
     * Get squadeRequirements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquadRequirements()
    {
        return $this->squadRequirements;
    }

    /**
     * Set min
     *
     * @param integer $min
     *
     * @return Squad
     */
    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get min
     *
     * @return integer
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
     * @return Squad
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get max
     *
     * @return integer
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Add squadRequirement
     *
     * @param \MainAppBundle\Entity\squadRequirement $squadRequirement
     *
     * @return Squad
     */
    public function addSquadRequirement(\MainAppBundle\Entity\squadRequirement $squadRequirement)
    {
        $this->squadRequirements[] = $squadRequirement;

        return $this;
    }

    /**
     * Remove squadRequirement
     *
     * @param \MainAppBundle\Entity\squadRequirement $squadRequirement
     */
    public function removeSquadRequirement(\MainAppBundle\Entity\squadRequirement $squadRequirement)
    {
        $this->squadRequirements->removeElement($squadRequirement);
    }

    /**
     * Add squadEntity
     *
     * @param \MainAppBundle\Entity\SquadsEntity $squadEntity
     *
     * @return Squad
     */
    public function addSquadEntity(\MainAppBundle\Entity\SquadsEntity $squadEntity)
    {
        $this->squadEntity[] = $squadEntity;

        return $this;
    }

    /**
     * Remove squadEntity
     *
     * @param \MainAppBundle\Entity\SquadsEntity $squadEntity
     */
    public function removeSquadEntity(\MainAppBundle\Entity\SquadsEntity $squadEntity)
    {
        $this->squadEntity->removeElement($squadEntity);
    }

    /**
     * Get squadEntity
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquadEntity()
    {
        return $this->squadEntity;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set subFaction.
     *
     * @param \MainAppBundle\Entity\SubFaction|null $subFaction
     *
     * @return Squad
     */
    public function setSubFaction(\MainAppBundle\Entity\SubFaction $subFaction = null)
    {
        $this->subFaction = $subFaction;

        return $this;
    }

    /**
     * Get subFaction.
     *
     * @return \MainAppBundle\Entity\SubFaction|null
     */
    public function getSubFaction()
    {
        return $this->subFaction;
    }
}
