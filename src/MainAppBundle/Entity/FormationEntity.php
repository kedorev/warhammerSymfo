<?php

namespace MainAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FormationEntity
 *
 * @ORM\Table(name="formation_entity")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\FormationEntityRepository")
 */
class FormationEntity
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
     * @var Liste
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Liste", inversedBy="formationsListe")
     */
    private $list;


    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="MainAppBundle\Entity\SquadsEntity", mappedBy="formation")
     */
    private $SquadsEntity;



    /**
     * @var Models
     *
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Formation", inversedBy="formationEntities")
     * @ORM\JoinColumn(name="formationTemplateId")
     *
     * @Assert\NotBlank()
     */
    private $formationModel;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\Faction")
     */
    private $faction;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="MainAppBundle\Entity\SubFaction")
     */
    private $subFaction;


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
        $this->SquadsEntity = new ArrayCollection();
    }

    /**
     * Set list
     *
     * @param \MainAppBundle\Entity\Liste $list
     *
     * @return FormationEntity
     */
    public function setList(\MainAppBundle\Entity\Liste $list = null)
    {
        $this->list = $list;

        return $this;
    }

    /**
     * Get list
     *
     * @return \MainAppBundle\Entity\Liste
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Add squadsEntity
     *
     * @param \MainAppBundle\Entity\SquadsEntity $squadsEntity
     *
     * @return FormationEntity
     */
    public function addSquadsEntity(\MainAppBundle\Entity\SquadsEntity $squadsEntity)
    {
        $this->SquadsEntity[] = $squadsEntity;

        return $this;
    }

    /**
     * Remove squadsEntity
     *
     * @param \MainAppBundle\Entity\SquadsEntity $squadsEntity
     */
    public function removeSquadsEntity(\MainAppBundle\Entity\SquadsEntity $squadsEntity)
    {
        $this->SquadsEntity->removeElement($squadsEntity);
    }

    /**
     * Get squadsEntity
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquadsEntity()
    {
        return $this->SquadsEntity;
    }

    /**
     * Get squadsEntity by squad type
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquadsEntityBySquadType(SquadType $squadType)
    {
        $result = new ArrayCollection() ;
        foreach ($this->SquadsEntity as $squad)
        {
            if($squad->getSquadModel()->getType() == $squadType)
            {
                $result->add($squad);
            }
        }
        return $result;
    }




    /**
     * Set formationModel
     *
     * @param \MainAppBundle\Entity\Formation $formationModel
     *
     * @return FormationEntity
     */
    public function setFormationModel(\MainAppBundle\Entity\Formation $formationModel = null)
    {
        $this->formationModel = $formationModel;

        return $this;
    }

    /**
     * Get formationModel
     *
     * @return \MainAppBundle\Entity\Formation
     */
    public function getFormationModel()
    {
        return $this->formationModel;
    }



    public function getTotalPoint(): int
    {
        $point = 0;
        foreach ( $this->getSquadsEntity() as $squadEntity )
        {
            $point = $point + $squadEntity->getTotalPoint();
        }
        return $point;
    }


    public function getCommandPoint()
    {
        return $this->getFormationModel()->getCommandPoint();
    }


    public function getNbSquadByType($typedId)
    {
        $count = 0;
        foreach($this->getSquadsEntity() as $squad)
        {
            if($squad->getType() == $typedId)
            {
                $count++;
            }
        }
        return $count;
    }


    public function isValide()
    {
        $formationRequirements = $this->getFormationModel()->getFormationRequirements();
        foreach($formationRequirements as $formationRequirement)
        {
            if($this->getNbSquadByType($formationRequirement->getSquadType()->getId()) < $formationRequirement->getMin()  )
            {
                return false;
            }
            else if($this->getNbSquadByType($formationRequirement->getSquadType()->getId()) > $formationRequirement->getMax())
            {
                return false;
            }
        }
        return true;
    }

    

    /**
     * Set faction
     *
     * @param \MainAppBundle\Entity\Faction $faction
     *
     * @return FormationEntity
     */
    public function setFaction(\MainAppBundle\Entity\Faction $faction = null)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get faction
     *
     * @return \MainAppBundle\Entity\Faction
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Set subFaction.
     *
     * @param \MainAppBundle\Entity\SubFaction|null $subFaction
     *
     * @return FormationEntity
     */
    public function setSubFaction(\MainAppBundle\Entity\SubFaction $subFaction = null)
    {
        $this->subFaction = $subFaction;

        return $this;
    }

    /**
     * Get subFaction.
     *
     * @return \MainAppBundle\Entity\SubFaction|null
     */
    public function getSubFaction()
    {
        return $this->subFaction;
    }
}
