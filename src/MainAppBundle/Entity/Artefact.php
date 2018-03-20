<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Artefact
 *
 * @ORM\Table(name="artefact")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\ArtefactRepository")
 */
class Artefact
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Faction", inversedBy="artefacts")
     */
    private $faction;

    /**
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\SubFaction", inversedBy="artefacts")
     */
    private $subFaction;

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
     * @return Artefact
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
     * Set description
     *
     * @param string $description
     *
     * @return Artefact
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set faction
     *
     * @param \MainAppBundle\Entity\Faction $faction
     *
     * @return Artefact
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
     * @return mixed
     */
    public function getSubFaction()
    {
        return $this->subFaction;
    }

    /**
     * @param mixed $subFaction
     */
    public function setSubFaction($subFaction): void
    {
        $this->subFaction = $subFaction;
    }



}
