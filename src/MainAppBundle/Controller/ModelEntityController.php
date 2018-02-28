<?php

namespace MainAppBundle\Controller;

use Doctrine\ORM\Tools\ToolsException;
use MainAppBundle\Entity\ModelEntity;
use MainAppBundle\Entity\Models;
use MainAppBundle\Entity\Squad;
use MainAppBundle\Entity\SquadsEntity;
use MainAppBundle\Entity\weaponEntity;
use MainAppBundle\Service\ModelEntityService;
use MainAppBundle\Service\weaponEntityService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


/**
 * Modelentity controller.
 *
 */
class ModelEntityController extends Controller
{
    /**
     * Lists all modelEntity entities.
     *
     * @Route("/modelentity", name="modelentity_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modelEntities = $em->getRepository('MainAppBundle:ModelEntity')->findAll();

        return $this->render('modelentity/index.html.twig', array(
            'modelEntities' => $modelEntities,
        ));
    }

    /**
     * Creates a new modelEntity entity.
     * @Route("/list/addModel", name="modelentity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $listId = $request->get('list_id');
        $idSquad = $request->get('squad_id');
        if($listId == null)
        {
            $listId = $request->request->get('mainappbundle_modelentity')['listId'];
        }
        if($idSquad == null)
        {
            $idSquad = $request->request->get('mainappbundle_modelentity')['squadId'];
        }
        $em = $this->getDoctrine()->getManager();
        $squadModele = $em->getRepository(Squad::class)->findOneById($em->getRepository(SquadsEntity::class)->findOneById($idSquad)->getSquadModel()->getId());
        $modelEntity = new Modelentity();
        $form = $this->createForm('MainAppBundle\Form\ModelEntityType', $modelEntity, [
            'methodUsed' => "create",
            'squad_type' => $squadModele
        ]);
        $form->add("listId", HiddenType::class, array("mapped"=>false, "data"=>$listId, "label"=>false));
        $form->add("squadId", HiddenType::class, array("mapped"=>false, "data"=>$idSquad, "label"=>false));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($modelEntity);

            $squadsEntity = $em->getRepository(SquadsEntity::class)->find($idSquad);
            $modelEntity->setSquadEntity($squadsEntity);
            foreach($modelEntity->getModelTemplate()->getWeapons() as $weapon)
            {
                for($i=1; $i < $weapon->getCount(); )
                {
                    $weaponEntity = new weaponEntity();
                    //$weaponEntity->
                    //$modelEntity->addWeaponsEntity(new );
                }

            }
            die;
            $em->flush();

            return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));
        }

        return $this->render('@MainApp/modelentity/new.html.twig', array(
            'modelEntity' => $modelEntity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a modelEntity entity.
     *
     * @Route("/modelentity/{id}", name="modelentity_show")
     * @Method("GET")
     */
    public function showAction(ModelEntity $modelEntity)
    {
        $deleteForm = $this->createDeleteForm($modelEntity);

        return $this->render('modelentity/show.html.twig', array(
            'modelEntity' => $modelEntity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing modelEntity entity.
     *
     * @Route("/list/editModel", name="modelentity_edit")
     * @Method({"POST"})
     */
    public function editAction(Request $request)
    {
        $modelId = $request->get('model_id');
        $listId = $request->get('list_id');
        if($listId == null)
        {
            $listId = $request->request->get('mainappbundle_modelentity')['listId'];
        }
        if($modelId == null)
        {
            $idSquad = $request->request->get('mainappbundle_modelentity')['modelId'];
        }

        $em =  $this->getDoctrine()->getManager();
        $modelEntity = $em->getRepository(ModelEntity::class)->findOneById($modelId);
        //$deleteForm = $this->createDeleteForm($modelEntity);
        $form = $this->createForm('MainAppBundle\Form\ModelEntityType', $modelEntity,[
            'methodUsed' => "update"
        ]);
        $form->add("listId", HiddenType::class, array("mapped"=>false, "data"=>$listId, "label"=>false));
        $form->add("modelId", HiddenType::class, array("mapped"=>false, "data"=>$modelId, "label"=>false));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();



            return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));
        }

        return $this->render('@MainApp/modelentity/edit.html.twig', array(
            'modelEntity' => $modelEntity,
            'edit_form' => $form->createView(),
            //'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a modelEntity entity.
     *
     * @Route("/list/removeModel", name="modelentity_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request)
    {
        $modelId = $request->get('model_id');
        $listId = $request->get('list_id');


        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository(ModelEntity::class)->find($modelId);
;
        $squadEntity = $model->getSquadEntity();
        $squadEntity->removeModelsEntity($model);
        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));
    }

    /**
     * Creates a form to delete a modelEntity entity.
     *
     * @param ModelEntity $modelEntity The modelEntity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ModelEntity $modelEntity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modelentity_delete', array('id' => $modelEntity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * @param Request $request
     *
     *
     * @Route("/models/duplicate/{id}", name="modelentity_duplicate")
     * @Method("GET")
     */
    public function duplicate(Request $request, $id)
    {
        $model =  $this->getDoctrine()->getRepository('MainAppBundle:ModelEntity')->find($id);
        //dump($model);
        $newmodel = $this->container->get('MainAppBundle\Service\ModelEntityService')->duplicate($model);
        dump($newmodel);

    }
}
