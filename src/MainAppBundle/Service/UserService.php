<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 21/02/2018
 * Time: 09:24
 */

namespace MainAppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use MainAppBundle\Entity\User;

class UserService extends baseService
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager);
    }


    public function getNbListe($userId)
    {
        return $this->em->getRepository(User::class)->getNbListsFromUser($userId);
    }
}