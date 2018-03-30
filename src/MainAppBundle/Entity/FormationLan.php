<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormationLan
 *
 * @ORM\Table(name="formation_lan")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\FormationLanRepository")
 */
class FormationLan
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
     * @ORM\Column(type="string")
     */
    private $name;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Faction");
     */
    private $faction;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Language");
     */
    private $language;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
