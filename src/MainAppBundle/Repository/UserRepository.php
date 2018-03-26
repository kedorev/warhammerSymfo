<?php

namespace MainAppBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{

    public function getNbListsFromUser($userid)
    {
        $query = $this->createQueryBuilder('u');
        $query->select($query->expr()->count('l'))
            ->join('u.liste',"l")
            ->where("u.id = :userId")
            ->setParameter("userId", $userid);
        return $query;
    }
}
