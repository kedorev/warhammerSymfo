<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 21/02/2018
 * Time: 10:44
 */

namespace MainAppBundle\Service;


use MainAppBundle\Entity\Liste;

class ListeService
{
    /**
     * @var Liste
     */
    private $liste;

    public function __construct(Liste $liste)
    {
        $this->liste = $liste;
    }


}