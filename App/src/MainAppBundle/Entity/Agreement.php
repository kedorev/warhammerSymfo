<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * agreement / convention
 *
 * @ORM\Table(name="agreement")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\agreementRepository")
 */
class Agreement
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
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Models", inversedBy="aggrements")
     */
    private $models;

    /**
     * @ORM\Column(name="description", type="text", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", name="source")
     */
    private $source;

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
        $this->models = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Agreement
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
     * Add model
     *
     * @param \MainAppBundle\Entity\Models $model
     *
     * @return Agreement
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

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Agreement
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }
}
