<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsychicCategory
 *
 * @ORM\Table(name="psychic_category")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\PsychicCategoryRepository")
 */
class PsychicCategory
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
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\PsychicPower", mappedBy="PsychicCategory")
     */
    private $psychicPowers;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Constructor
     */
    public function __construct()
    {
        $this->psychicPowers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add psychicPower
     *
     * @param \MainAppBundle\Entity\PsychicPower $psychicPower
     *
     * @return PsychicCategory
     */
    public function addPsychicPower(\MainAppBundle\Entity\PsychicPower $psychicPower)
    {
        $this->psychicPowers[] = $psychicPower;

        return $this;
    }

    /**
     * Remove psychicPower
     *
     * @param \MainAppBundle\Entity\PsychicPower $psychicPower
     */
    public function removePsychicPower(\MainAppBundle\Entity\PsychicPower $psychicPower)
    {
        $this->psychicPowers->removeElement($psychicPower);
    }

    /**
     * Get psychicPowers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPsychicPowers()
    {
        return $this->psychicPowers;
    }
}
