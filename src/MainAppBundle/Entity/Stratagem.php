<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Stratagem
 *
 * @ORM\Table(name="stratagem")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\StratagemRepository")
 */
class Stratagem
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
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="text")
     */
    private $name;

    /**
     * @var
     */
    private $CPcost;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
