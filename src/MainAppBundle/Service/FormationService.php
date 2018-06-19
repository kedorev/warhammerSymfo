<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 30/03/2018
 * Time: 10:17
 */

namespace MainAppBundle\Service;


use MainAppBundle\Entity\FormationLan;
use MainAppBundle\Entity\Language;
use MainAppBundle\Entity\Formation;
use Symfony\Component\Intl\Locale;


class FormationService extends baseService
{

    public function getTraduction(Formation $formation, Language $lang)
    {
        dump(Locale::getDefault());
        $trad = $this->em->getRepository(Formation::class)->getTraduction($lang);
        if($trad == "" || is_null($trad))
        {
            $trad = $formation->getName();
        }
        return $trad;
    }
}