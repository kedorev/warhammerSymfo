<?php

namespace MainAppBundle\Controller;

use MainAppBundle\Entity\Formation;
use MainAppBundle\Entity\FormationEntity;
use MainAppBundle\Entity\Liste;
use MainAppBundle\Form\ListeType;
use MainAppBundle\Form\FormationEntityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\Form;
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

        $factionsType = $repository->getAllType();

        foreach($factionsType as $factionType)
        {
            $factions[$factionType["type"]] = $repository->getTypeFactionSortByName($factionType["type"]);
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
     * @Route("/list", name="main_app_list")
     */
    public function listAction(Request $request)
    {
        $user = $this->getUser();
        if(!isset($user))
        {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $list = new Liste();

        $form = $this->createForm(ListeType::class, $list);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $list = $form->getData();
            $list->setOwner($user);
            $list->setArtefactNumber(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($list);
            $em->flush();
//            $url = $this->get('router')->generate('main_app_listShow', array('id'=> $list->getId()));

            return $this->redirectToRoute('main_app_listShow', [
                'id' => $list->getId(),
            ]);
        }


        // On passe la m�thode createView() du formulaire � la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('@MainApp/Default/list.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/list/{id}",name="main_app_listShow", requirements={"id": "\d+"})
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listShowAction(Request $request, $id)
    {
        $user = $this->getUser();
        if(!isset($user))
        {
            return $this->redirectToRoute('fos_user_security_login');
        }
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Liste');

        $list = $repository->find($id);

        return $this->render('@MainApp/Default/listShow.html.twig', array('liste' => $list));
    }


    /**
     * @Route("/lists", name="showAllList")
     */
    public function showAllList()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Liste');
        $list = $repository->findAll();

        return $this->render('@MainApp/Liste/allList.html.twig', array('listArray' => $list));
    }

}
