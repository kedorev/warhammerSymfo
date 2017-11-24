<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SquadType
 *
 * @ORM\Table(name="squad_type")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\SquadTypeRepository")
 */
class SquadType
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
     * @var int
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="img_url", type="string", length=255)
     */
    private $image;

    /**
     * @var array(squads)
     *
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Squad", mappedBy="type")
     */
    private $squads;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\FormationRequirement", mappedBy="SquadType")
     */
    private $formationRequirements;

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
     * Constructor
     */
    public function __construct()
    {
        $this->squads = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     *
     * @return SquadType
     */
    public function addSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->squads[] = $squad;

        return $this;
    }

    /**
     * Remove squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     */
    public function removeSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->squads->removeElement($squad);
    }

    /**
     * Get squads
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquads()
    {
        return $this->squads;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SquadType
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
     * Add formationRequirement
     *
     * @param \MainAppBundle\Entity\FormationRequirement $formationRequirement
     *
     * @return SquadType
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

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return SquadType
     */
    public function setImage(?string $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }
}
