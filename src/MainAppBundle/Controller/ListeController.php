<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 20/02/2018
 * Time: 17:45
 */

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

class ListeController extends Controller
{

    /**
     * @Route("/list/new", name="main_app_list")
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
        $user = $this->getUser();
        if(!isset($user))
        {
            return $this->redirectToRoute('fos_user_security_login');
        }
        $repository = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Liste');
        $list = $repository->getAllListByUser($this->getUser()->getId());

        return $this->render('MainAppBundle:Liste:allList.html.twig', array('listArray' => $list));
    }

    /**
     * AJAX route
     *
     * @Route("/list/update",name="main_app_updateList", options={"expose"=true})
     * @Method({"POST"})
     */
    public function listUpdateAction(Request $request)
    {
        $listId = $request->get('listId');
        if(isset($listId) && $listId != null)
        {
            $em = $this->getDoctrine()->getManager();
            $list = $em->getRepository(Liste::class)->findOneById($listId);
            $method = $request->get('method');
            $value = $request->get('value');
            if($method == "updatePointLimit" && isset($value))
            {
                $list->setPointsLimit(intval($value));
            }
            elseif($method == "updateArtefactNumber" && isset($value))
            {
                $list->setArtefactNumber(intval($value));
                echo $list->getAvailableCommandPoint();
            }
            elseif($method == "updateName" && isset($value))
            {
                $list->setName($value);
            }

            $em->flush();
        }

        return new Response();
    }

}