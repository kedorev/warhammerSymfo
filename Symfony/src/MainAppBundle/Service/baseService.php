<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 28/02/2018
 * Time: 11:46
 */

namespace MainAppBundle\Service;


use Doctrine\ORM\EntityManagerInterface;

abstract class baseService
{

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
}