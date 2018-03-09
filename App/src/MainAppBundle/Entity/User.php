<?php

namespace MainAppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Army", mappedBy="user")
     */
    protected $army;

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
     * Add army
     *
     * @param \MainAppBundle\Entity\Army $army
     *
     * @return User
     */
    public function addArmy(\MainAppBundle\Entity\Army $army)
    {
        $this->army[] = $army;

        return $this;
    }

    /**
     * Remove army
     *
     * @param \MainAppBundle\Entity\Army $army
     */
    public function removeArmy(\MainAppBundle\Entity\Army $army)
    {
        $this->army->removeElement($army);
    }

    /**
     * Get army
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArmy()
    {
        return $this->army;
    }
}
