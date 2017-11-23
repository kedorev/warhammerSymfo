<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfilEntity
 *
 * @ORM\Table(name="profil_entity")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\ProfilEntityRepository")
 */
class ProfilEntity
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
     * @ORM\Column(name="toughness", type="integer")
     */
    private $toughness;

    /**
     * @var int
     *
     * @ORM\Column(name="Wound", type="integer")
     */
    private $wound;


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
     * @ORM\Column(name="Attack", type="integer")
     */
    private $attack;

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
     * Set toughness
     *
     * @param integer $toughness
     *
     * @return ProfilEntity
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

    /**
     * Set wound
     *
     * @param integer $wound
     *
     * @return ProfilEntity
     */
    public function setWound($wound)
    {
        $this->wound = $wound;

        return $this;
    }

    /**
     * Get wound
     *
     * @return integer
     */
    public function getWound()
    {
        return $this->wound;
    }

    /**
     * Set leadership
     *
     * @param integer $leadership
     *
     * @return ProfilEntity
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
     * @return ProfilEntity
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
     * Set move
     *
     * @param integer $move
     *
     * @return ProfilEntity
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
     * @return ProfilEntity
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
     * @return ProfilEntity
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
     * @return ProfilEntity
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
     * @return ProfilEntity
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
}
