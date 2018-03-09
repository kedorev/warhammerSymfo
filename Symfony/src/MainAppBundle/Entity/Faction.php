<?php

namespace MainAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 *
 * @ORM\Table(name="faction")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\FactionRepository")
 */
class Faction
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
     * @var
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\FactionType")
     */
    private $type;

    /**
     * @var squad
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Squad", mappedBy="faction")
     */
    private $squad;

    /**
     * @var Models
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Models")
     */
    private $models;


    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\SubFaction", mappedBy="faction")
     */
    private $SubFactions;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Artefact", mappedBy="faction")
     */
    private $artefacts;

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
     * @return Faction
     */
    public function setName(string $name)
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
        $this->squad = new \Doctrine\Common\Collections\ArrayCollection();
        $this->SubFactions = new ArrayCollection();
        $this->artefacts = new ArrayCollection();
        $this->models = new ArrayCollection();
    }

    /**
     * Add squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     *
     * @return Faction
     */
    public function addSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->squad[] = $squad;

        return $this;
    }

    /**
     * Remove squad
     *
     * @param \MainAppBundle\Entity\Squad $squad
     */
    public function removeSquad(\MainAppBundle\Entity\Squad $squad)
    {
        $this->squad->removeElement($squad);
    }

    /**
     * Get squad
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquad(): ArrayCollection
    {
        return $this->squad;
    }

    /**
     * Add model
     *
     * @param \MainAppBundle\Entity\Models $model
     *
     * @return Faction
     */
    public function addModel(\MainAppBundle\Entity\Models $model)
    {
        $this->models[] = $model;

        return $this;
    }

    /**
     * Remove model
     *
     * @param \MainAppBundle\Entity\Models $model
     */
    public function removeModel(\MainAppBundle\Entity\Models $model)
    {
        $this->models->removeElement($model);
    }

    /**
     * Get models
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModels()
    {
        return $this->models;
    }



    public function __toString()
    {
        $string = $this->getName();
        if(is_null($string))
        {
            $string = "";
        }
        return $string;
    }

    /**
     * Set type
     *
     * @param \MainAppBundle\Entity\FactionType $type
     *
     * @return Faction
     */
    public function setType(\MainAppBundle\Entity\FactionType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \MainAppBundle\Entity\FactionType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add artefact
     *
     * @param \MainAppBundle\Entity\Artefact $artefact
     *
     * @return Faction
     */
    public function addArtefact(\MainAppBundle\Entity\Artefact $artefact)
    {
        $this->artefacts[] = $artefact;

        return $this;
    }

    /**
     * Remove artefact
     *
     * @param \MainAppBundle\Entity\Artefact $artefact
     */
    public function removeArtefact(\MainAppBundle\Entity\Artefact $artefact)
    {
        $this->artefacts->removeElement($artefact);
    }

    /**
     * Get artefacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtefacts()
    {
        return $this->artefacts;
    }

    /**
     * Add subFaction
     *
     * @param \MainAppBundle\Entity\SubFaction $subFaction
     *
     * @return Faction
     */
    public function addSubFaction(\MainAppBundle\Entity\SubFaction $subFaction)
    {
        $this->SubFactions[] = $subFaction;

        return $this;
    }

    /**
     * Remove subFaction
     *
     * @param \MainAppBundle\Entity\SubFaction $subFaction
     */
    public function removeSubFaction(\MainAppBundle\Entity\SubFaction $subFaction)
    {
        $this->SubFactions->removeElement($subFaction);
    }

    /**
     * Get subFactions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubFactions()
    {
        return $this->SubFactions;
    }
}
