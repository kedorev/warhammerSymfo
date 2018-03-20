<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SubFaction
 *
 * @ORM\Table(name="sub_faction")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\SubFactionRepository")
 */
class SubFaction
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
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Faction", inversedBy="SubFactions")
     */
    private $faction;


    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string")
     */
    private $name;


    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="rules", type="text")
     */
    private $rules;


    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Artefact", mappedBy="subFaction")
     */
    private $artefacts;



    public function __construct()
    {
        $this->artefacts = new ArrayCollection();
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
     * Set faction
     *
     * @param \MainAppBundle\Entity\Faction $faction
     *
     * @return SubFaction
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
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getRules(): ?string
    {
        return $this->rules;
    }

    /**
     * @param string $rules
     */
    public function setRules(string $rules): void
    {
        $this->rules = $rules;
    }


    /**
     * Add artefact.
     *
     * @param \MainAppBundle\Entity\Artefact $artefact
     *
     * @return SubFaction
     */
    public function addArtefact(\MainAppBundle\Entity\Artefact $artefact)
    {
        $this->artefacts[] = $artefact;

        return $this;
    }

    /**
     * Remove artefact.
     *
     * @param \MainAppBundle\Entity\Artefact $artefact
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeArtefact(\MainAppBundle\Entity\Artefact $artefact)
    {
        return $this->artefacts->removeElement($artefact);
    }

    /**
     * Get artefacts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtefacts()
    {
        return $this->artefacts;
    }


    public function __toString()
    {
        return $this->name;
    }
}
