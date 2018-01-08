<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PsychicPower
 *
 * @ORM\Table(name="psychic_power")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\PsychicPowerRepository")
 */
class PsychicPower
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
     * @var int
     *
     * @ORM\Column(name="power", type="integer")
     */
    private $power;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\PsychicCategory", inversedBy="psychicPowers")
     */
    private $PsychicCategory;

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
     * @return PsychicPower
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
     * Set power
     *
     * @param integer $power
     *
     * @return PsychicPower
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return int
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return PsychicPower
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
     * Set psychicCategory
     *
     * @param \MainAppBundle\Entity\PsychicCategory $psychicCategory
     *
     * @return PsychicPower
     */
    public function setPsychicCategory(\MainAppBundle\Entity\PsychicCategory $psychicCategory = null)
    {
        $this->PsychicCategory = $psychicCategory;

        return $this;
    }

    /**
     * Get psychicCategory
     *
     * @return \MainAppBundle\Entity\PsychicCategory
     */
    public function getPsychicCategory()
    {
        return $this->PsychicCategory;
    }
}
