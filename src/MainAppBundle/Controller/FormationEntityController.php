<?php

namespace MainAppBundle\Controller;

use MainAppBundle\Entity\FormationEntity;
use MainAppBundle\Entity\Liste;
use MainAppBundle\Form\FormationEntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Formationentity controller.
 *
 */
class FormationEntityController extends Controller
{

    /**
     * @Route("ajax_getFormationForm",name="getFormationFormRoute",options={"expose"=true})
     * @Method({"POST"})
     */
    public function getFormAction(Request $request)
    {
        $formationId = $request->get('formationEntityId');
        $listId = $request->get('listeId');
        $formationEntity = $this->getDoctrine()->getRepository(FormationEntity::class)->findOneById($formationId);
        $editForm = $this->createForm('MainAppBundle\Form\FormationEntityType', $formationEntity);
        $template =$this->renderView('@MainApp/formationentity/editForm.html.twig', array('edit_form' => $editForm->createView(), 'liste_id'=>$listId));
        $json = json_encode($template);
        $response = new Response($json, 200);
        return $response;
    }



    /**
     * @Route("ajax_updateFormation/{id}",name="updateFormationEntity",options={"expose"=true})
     * @Method({"POST"})
     */
    public function updateAction(Request $request, $id)
    {
        $formationEntity = $this->getDoctrine()->getRepository(FormationEntity::class)->findOneById($id);

        $form = $this->createForm('MainAppBundle\Form\FormationEntityType', $formationEntity);



        $form->handleRequest($request);
        dump($form);
        if ($form->isValid()) {

            dump('valide');
            $this->getDoctrine()->getManager()->flush();
            $response = new Response('ok',200);
        } else {
            $response = new Response('invalid data in form', 400);
        }
        return $response;
    }


    /**
     * Creates a new formationEntity entity.
     *
     * @Route("/list/addFormation", name="addFormationRoute")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $listId = $request->get('list_id');
        if($listId == null)
        {
            $listId = $request->request->get('mainappbundle_formationentity')['listId'];
        }
        $formationEntity = new Formationentity();
        $form = $this->createForm('MainAppBundle\Form\FormationEntityType', $formationEntity);
        $form->add("listId", HiddenType::class, array("mapped"=>false, "data"=>$listId, "label"=>false));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $list = $em->getRepository(Liste::class)->find($listId);
            $formationEntity->setList($list);
            $em->persist($formationEntity);
            $em->flush();

            return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));
        }

        return $this->render('@MainApp/formationentity/new.html.twig', array(
            'formationEntity' => $formationEntity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing formationEntity entity.
     *
     * Route("/{id}/edit", name="formationentity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FormationEntity $formationEntity)
    {
        $deleteForm = $this->createDeleteForm($formationEntity);
        $editForm = $this->createForm('MainAppBundle\Form\FormationEntityType', $formationEntity);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formationentity_edit', array('id' => $formationEntity->getId()));
        }

        return $this->render('formationentity/edit.html.twig', array(
            'formationEntity' => $formationEntity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a formationEntity entity.
     *
     * Route("list/formation/delete", name="formationentity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request)
    {
        $listId = $request->get('list_id');
        if($listId == null)
        {
            $listId = $request->request->get('mainappbundle_formationentity')['listId'];
        }

        $FormationId = $request->get('formation_id');

        $em = $this->getDoctrine()->getManager();
        $formation = $this->getDoctrine()->getRepository(FormationEntity::class)->findOneById($FormationId);

        $em->remove($formation);
        die;
        $em->flush();
        return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));
    }

    /**
     * Creates a form to delete a formationEntity entity.
     *
     * @param FormationEntity $formationEntity The formationEntity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FormationEntity $formationEntity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formationentity_delete', array('id' => $formationEntity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
