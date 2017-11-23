<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\GameRepository")
 */
class Game
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
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Liste")
     */
    private $listPlayer1;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Liste")
     */
    private $listPlayer2;

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
     * Set listPlayer1
     *
     * @param \MainAppBundle\Entity\Liste $listPlayer1
     *
     * @return Game
     */
    public function setListPlayer1(\MainAppBundle\Entity\Liste $listPlayer1 = null)
    {
        $this->listPlayer1 = $listPlayer1;

        return $this;
    }

    /**
     * Get listPlayer1
     *
     * @return \MainAppBundle\Entity\Liste
     */
    public function getListPlayer1()
    {
        return $this->listPlayer1;
    }

    /**
     * Set listPlayer2
     *
     * @param \MainAppBundle\Entity\Liste $listPlayer2
     *
     * @return Game
     */
    public function setListPlayer2(\MainAppBundle\Entity\Liste $listPlayer2 = null)
    {
        $this->listPlayer2 = $listPlayer2;

        return $this;
    }

    /**
     * Get listPlayer2
     *
     * @return \MainAppBundle\Entity\Liste
     */
    public function getListPlayer2()
    {
        return $this->listPlayer2;
    }
}
