<?php

namespace MainAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Models
 *
 * @ORM\Table(name="models")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\ModelsRepository")
 */
class Models
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
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Profil")
     */
    private $profils;

    /**
     * @var array(Abilities)
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Abilities")
     */
    private $abilities;


    /**
     * @var array(KeyWord)
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\KeyWord")
     */
    private $keysWord;

    /**
     * @var array(FactionKeyWord)
     *
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Faction")
     */
    private $factionKeyWord;

    /**
     * @var integer
     *
     * @ORM\Column(name="power", type="integer")
     */
    private $power;


    /**
     * @var integer
     *
     * @ORM\Column(name="point", type="integer")
     */
    private $point;

    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\Weapons_Model",mappedBy="model")
     */
    private $weapons;

    /**
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\Equipment")
     */
    private $equipements;

    /**
     * @ORM\Column(name="nb_psychic_power", type="integer")
     */
    private $nbPsychicPower;


    /**
     * @ORM\ManyToMany(targetEntity="MainAppBundle\Entity\PsychicCategory")
     */
    private $psychicCategoryAvailable;

    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\ModelEntity",mappedBy="modelTemplate")
     */
    private $ModelEntity;

    /**
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\squadRequirement", mappedBy="model")
     */
    private $requirementSquad;


    public function __construct() {
        $this->abilities = new ArrayCollection();
        $this->keysWord = new ArrayCollection();
        $this->weapons = new ArrayCollection();
        $this->profils = new ArrayCollection();
        $this->psychicCategoryAvailable = new ArrayCollection();
    }





    /**
     * Add ability
     *
     * @param \MainAppBundle\Entity\Abilities $ability
     *
     * @return Models
     */
    public function addAbility(\MainAppBundle\Entity\Abilities $ability)
    {
        $this->abilities[] = $ability;

        return $this;
    }

    /**
     * Remove ability
     *
     * @param \MainAppBundle\Entity\Abilities $ability
     */
    public function removeAbility(\MainAppBundle\Entity\Abilities $ability)
    {
        $this->abilities->removeElement($ability);
    }

    /**
     * Get abilities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * Add keysWord
     *
     * @param \MainAppBundle\Entity\KeyWord $keysWord
     *
     * @return Models
     */
    public function addKeysWord(\MainAppBundle\Entity\KeyWord $keysWord)
    {
        $this->keysWord[] = $keysWord;

        return $this;
    }

    /**
     * Remove keysWord
     *
     * @param \MainAppBundle\Entity\KeyWord $keysWord
     */
    public function removeKeysWord(\MainAppBundle\Entity\KeyWord $keysWord)
    {
        $this->keysWord->removeElement($keysWord);
    }

    /**
     * Get keysWord
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeysWord()
    {
        return $this->keysWord;
    }



    /**
     * @return int
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return Models
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
     * Set toughness
     *
     * @param integer $toughness
     *
     * @return Models
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
     * @return Models
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
     * @return Models
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
     * @return Models
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
     * Set point
     *
     * @param integer $point
     *
     * @return Models
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return integer
     */
    public function getPoint()
    {
        return $this->point;
    }


    /**
     * return how many profil is linked
     *
     * @return int
     */
    public function getNbProfil()
    {
        return count($this->profils);
    }


    /**
     * Add weapon
     *
     * @param \MainAppBundle\Entity\Weapon $weapon
     *
     * @return Models
     */
    public function addProfil(\MainAppBundle\Entity\Profil $profil)
    {
        $this->profils[] = $profil;

        return $this;
    }

    /**
     * Remove weapon
     *
     * @param \MainAppBundle\Entity\Weapon $weapon
     */
    public function removeProfil(\MainAppBundle\Entity\Profil $profil)
    {
        $this->profils->removeElement($profil);
    }

    /**
     * Get weapons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfil()
    {
        return $this->profils;
    }

    /**
     * Get profils
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfils()
    {
        return $this->profils;
    }

    public function getProfilsByWound(int $wound): Profil
    {
        foreach($this->profils as $profil)
        {
            if($wound <= $profil->getMaxWound() && $wound >= $profil->getMinWound())
            {
                return $profil;
            }
        }
        return false;
    }

    /**
     * Add factionKeyWord
     *
     * @param \MainAppBundle\Entity\Faction $factionKeyWord
     *
     * @return Models
     */
    public function addFactionKeyWord(\MainAppBundle\Entity\Faction $factionKeyWord)
    {
        $this->factionKeyWord[] = $factionKeyWord;

        return $this;
    }

    /**
     * Remove factionKeyWord
     *
     * @param \MainAppBundle\Entity\Faction $factionKeyWord
     */
    public function removeFactionKeyWord(\MainAppBundle\Entity\Faction $factionKeyWord)
    {
        $this->factionKeyWord->removeElement($factionKeyWord);
    }

    /**
     * Get factionKeyWord
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFactionKeyWord()
    {
        return $this->factionKeyWord;
    }


    public function getKeyWordAsString(): string
    {
        $string = "";
        foreach($this->keysWord as $keywords)
        {
            $string .= $keywords->getName();
        }
        return $string;
    }

    /**
     * Add modelEntity
     *
     * @param \MainAppBundle\Entity\ModelEntity $modelEntity
     *
     * @return Models
     */
    public function addModelEntity(\MainAppBundle\Entity\ModelEntity $modelEntity)
    {
        $this->ModelEntity[] = $modelEntity;

        return $this;
    }

    /**
     * Remove modelEntity
     *
     * @param \MainAppBundle\Entity\ModelEntity $modelEntity
     */
    public function removeModelEntity(\MainAppBundle\Entity\ModelEntity $modelEntity)
    {
        $this->ModelEntity->removeElement($modelEntity);
    }

    /**
     * Get modelEntity
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModelEntity()
    {
        return $this->ModelEntity;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Add requirementSquad
     *
     * @param \MainAppBundle\Entity\squadRequirement $requirementSquad
     *
     * @return Models
     */
    public function addRequirementSquad(\MainAppBundle\Entity\squadRequirement $requirementSquad)
    {
        $this->requirementSquad[] = $requirementSquad;

        return $this;
    }

    /**
     * Remove requirementSquad
     *
     * @param \MainAppBundle\Entity\squadRequirement $requirementSquad
     */
    public function removeRequirementSquad(\MainAppBundle\Entity\squadRequirement $requirementSquad)
    {
        $this->requirementSquad->removeElement($requirementSquad);
    }

    /**
     * Get requirementSquad
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequirementSquad()
    {
        return $this->requirementSquad;
    }

    /**
     * Add weapon
     *
     * @param \MainAppBundle\Entity\Weapons_Model $weapon
     *
     * @return Models
     */
    public function addWeapon(\MainAppBundle\Entity\Weapons_Model $weapon)
    {
        $this->weapons[] = $weapon;

        return $this;
    }

    /**
     * Remove weapon
     *
     * @param \MainAppBundle\Entity\Weapons_Model $weapon
     */
    public function removeWeapon(\MainAppBundle\Entity\Weapons_Model $weapon)
    {
        $this->weapons->removeElement($weapon);
    }

    /**
     * Get weapons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeapons()
    {
        return $this->weapons;
    }

    /**
     * Add equipement
     *
     * @param \MainAppBundle\Entity\Equipment $equipement
     *
     * @return Models
     */
    public function addEquipement(\MainAppBundle\Entity\Equipment $equipement)
    {
        $this->equipements[] = $equipement;

        return $this;
    }

    /**
     * Remove equipement
     *
     * @param \MainAppBundle\Entity\Equipment $equipement
     */
    public function removeEquipement(\MainAppBundle\Entity\Equipment $equipement)
    {
        $this->equipements->removeElement($equipement);
    }

    /**
     * Get equipements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * Set nbPsychicPower
     *
     * @param integer $nbPsychicPower
     *
     * @return Models
     */
    public function setNbPsychicPower($nbPsychicPower)
    {
        $this->nbPsychicPower = $nbPsychicPower;

        return $this;
    }

    /**
     * Get nbPsychicPower
     *
     * @return integer
     */
    public function getNbPsychicPower()
    {
        return $this->nbPsychicPower;
    }

    /**
     * Add psychicCategoryAvailable
     *
     * @param \MainAppBundle\Entity\PsychicCategory $psychicCategoryAvailable
     *
     * @return Models
     */
    public function addPsychicCategoryAvailable(\MainAppBundle\Entity\PsychicCategory $psychicCategoryAvailable)
    {
        $this->psychicCategoryAvailable[] = $psychicCategoryAvailable;

        return $this;
    }

    /**
     * Remove psychicCategoryAvailable
     *
     * @param \MainAppBundle\Entity\PsychicCategory $psychicCategoryAvailable
     */
    public function removePsychicCategoryAvailable(\MainAppBundle\Entity\PsychicCategory $psychicCategoryAvailable)
    {
        $this->psychicCategoryAvailable->removeElement($psychicCategoryAvailable);
    }

    /**
     * Get psychicCategoryAvailable
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPsychicCategoryAvailable()
    {
        return $this->psychicCategoryAvailable;
    }
}
