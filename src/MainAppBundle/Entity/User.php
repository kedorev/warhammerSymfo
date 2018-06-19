<?php

namespace MainAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Liste", mappedBy="owner", orphanRemoval=true)
     */
    private $liste;


    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Language", inversedBy="users")
     */
    private $language;

    /**
     * User constructor.
     * @param $liste
     */
    public function __construct()
    {
        parent::__construct();
        $this->liste = new ArrayCollection();
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

    /**
     * Add liste.
     *
     * @param \MainAppBundle\Entity\Liste $liste
     *
     * @return User
     */
    public function addListe(\MainAppBundle\Entity\Liste $liste)
    {
        $this->liste[] = $liste;

        return $this;
    }

    /**
     * Remove liste.
     *
     * @param \MainAppBundle\Entity\Liste $liste
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeListe(\MainAppBundle\Entity\Liste $liste)
    {
        return $this->liste->removeElement($liste);
    }

    /**
     * Get liste.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListe()
    {
        return $this->liste;
    }
}
