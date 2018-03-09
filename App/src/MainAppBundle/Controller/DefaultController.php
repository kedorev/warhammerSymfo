<?php

namespace MainAppBundle\Controller;

use MainAppBundle\Entity\Formation;
use MainAppBundle\Entity\FormationEntity;
use MainAppBundle\Entity\Liste;
use MainAppBundle\Form\ListeType;
use MainAppBundle\Form\FormationEntityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use MainAppBundle\Entity\Models;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\YamlFileLoader;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="main_app_index");
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction( Request $request )
    {
        return $this->render('MainAppBundle:Default:index.html.twig');
    }

    /**
     * @Route("/Models", name="main_app_model")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function modelAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Models');
        $models = $repository->findAll();

        return $this->render('MainAppBundle:Default:Model.html.twig', array('models' => $models));
    }

    /**
     * @Route("/factions", name="main_app_factions")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function factionsAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Faction');

        $factionsType = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:FactionType')->findAll();

        foreach($factionsType as $factionType)
        {
            $factions[$factionType->getName()] = $repository->getTypeFactionSortByName($factionType);
        }
        return $this->render('MainAppBundle:Default:factions.html.twig', array('factions' => $factions));
    }

    /**
     * @Route("/faction/{faction}", name="main_app_faction")
     *
     * @param Request $request
     * @param $faction
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function factionAction(Request $request,string $faction)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Models');
        $models = $repository->getAllModelByFaction($faction);

        return $this->render('@MainApp/Default/Model.html.twig', array('models' => $models));
    }

    /**
     * @Route("/squads", name="main_app_squad")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function squadAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Squad');
        $squads = $repository->findAll();
        foreach($squads['0']->getSquadRequirements() as $requirement)
        {
            dump($requirement);
        }
        return $this->render('@MainApp/Default/squad.html.twig', array('squads' => $squads));
    }



    /**
     *
     * @Route("/about-us",name="main_app_aboutus")
     * @Method({"GET"})
     */
    public function aboutUsAction(Request $request)
    {

        return $this->render('MainAppBundle:Default:aboutUs.html.twig', array());
    }

    /**
     *
     * @Route("/contact",name="main_app_contact")
     * @Method({"GET"})
     *
     * @todo : faire la page de contact
     */
    public function contactAction(Request $request)
    {
        return $this->render('MainAppBundle:Default:inWork.html.twig', array());
    }

    /**
     * @Route("faction/lists/{id}",name="main_app_listsFaction")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listsFactionShowAction(Request $request, $id)
    {

        $faction = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Faction')->findOneById($id);
        $list = null;
        if(isset($faction))
        {
            $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Liste');
            $list = $repository->getAllListByFaction($id);
        }
        return $this->render('MainAppBundle:Liste:allList.html.twig', array('listArray' => $list));
    }


}
