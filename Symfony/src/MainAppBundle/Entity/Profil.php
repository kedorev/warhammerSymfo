<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\ProfilRepository")
 */
class Profil
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
     * @ORM\Column(name="move", type="integer")
     */
    private $move;

    /**
     * @var int
     *
     * @ORM\Column(name="WS", type="integer")
     */
    private $wS;

    /**
     * @var int
     *
     * @ORM\Column(name="BS", type="integer")
     */
    private $bS;

    /**
     * @var int
     *
     * @ORM\Column(name="Stregth", type="integer")
     */
    private $strength;

    /**
     * @var int
     *
     * @ORM\Column(name="min_wound", type="integer")
     */
    private $minWound;

    /**
     * @var int
     *
     * @ORM\Column(name="max_wound", type="integer")
     */
    private $maxWound;

    /**
     * @var int
     *
     * @ORM\Column(name="Attack", type="integer")
     */
    private $attack;


    /**
     * @var int
     *
     * @ORM\Column(name="Leadership", type="integer")
     */
    private $leadership;

    /**
     * @var int
     *
     * @ORM\Column(name="Save", type="integer")
     */
    private $save;


    /**
     * @var int
     *
     * @ORM\Column(name="toughness", type="integer")
     */
    private $toughness;



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
     * Set move
     *
     * @param integer $move
     *
     * @return Profil
     */
    public function setMove($move)
    {
        $this->move = $move;

        return $this;
    }

    /**
     * Get move
     *
     * @return integer
     */
    public function getMove()
    {
        return $this->move;
    }

    /**
     * Set wS
     *
     * @param integer $wS
     *
     * @return Profil
     */
    public function setWS($wS)
    {
        $this->wS = $wS;

        return $this;
    }

    /**
     * Get wS
     *
     * @return integer
     */
    public function getWS()
    {
        return $this->wS;
    }

    /**
     * Set bS
     *
     * @param integer $bS
     *
     * @return Profil
     */
    public function setBS($bS)
    {
        $this->bS = $bS;

        return $this;
    }

    /**
     * Get bS
     *
     * @return integer
     */
    public function getBS()
    {
        return $this->bS;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     *
     * @return Profil
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return integer
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set attack
     *
     * @param integer $attack
     *
     * @return Profil
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get attack
     *
     * @return integer
     */
    public function getAttack()
    {
        return $this->attack;
    }



    /**
     * Set minWound
     *
     * @param integer $minWound
     *
     * @return Profil
     */
    public function setMinWound($minWound)
    {
        $this->minWound = $minWound;

        return $this;
    }

    /**
     * Get minWound
     *
     * @return integer
     */
    public function getMinWound()
    {
        return $this->minWound;
    }

    /**
     * Set maxWound
     *
     * @param integer $maxWound
     *
     * @return Profil
     */
    public function setMaxWound($maxWound)
    {
        $this->maxWound = $maxWound;

        return $this;
    }

    /**
     * Get maxWound
     *
     * @return integer
     */
    public function getMaxWound()
    {
        return $this->maxWound;
    }

    /**
     * Set leadership
     *
     * @param integer $leadership
     *
     * @return Profil
     */
    public function setLeadership($leadership)
    {
        $this->leadership = $leadership;

        return $this;
    }

    /**
     * Get leadership
     *
     * @return integer
     */
    public function getLeadership()
    {
        return $this->leadership;
    }

    /**
     * Set save
     *
     * @param integer $save
     *
     * @return Profil
     */
    public function setSave($save)
    {
        $this->save = $save;

        return $this;
    }

    /**
     * Get save
     *
     * @return integer
     */
    public function getSave()
    {
        return $this->save;
    }

    /**
     * Set toughness
     *
     * @param integer $toughness
     *
     * @return Profil
     */
    public function setToughness($toughness)
    {
        $this->toughness = $toughness;

        return $this;
    }

    /**
     * Get toughness
     *
     * @return integer
     */
    public function getToughness()
    {
        return $this->toughness;
    }
}
