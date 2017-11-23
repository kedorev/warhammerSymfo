<?php

namespace MainAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artefact
 *
 * @ORM\Table(name="artefact")
 * @ORM\Entity(repositoryClass="MainAppBundle\Repository\ArtefactRepository")
 */
class Artefact
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }




}
