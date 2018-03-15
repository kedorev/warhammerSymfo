<?php

namespace MainAppBundle\Controller;

use MainAppBundle\Entity\Formation;
use MainAppBundle\Entity\FormationEntity;
use MainAppBundle\Entity\ModelEntity;
use MainAppBundle\Entity\Models;
use MainAppBundle\Entity\Profil;
use MainAppBundle\Entity\ProfilEntity;
use MainAppBundle\Entity\Squad;
use MainAppBundle\Entity\SquadsEntity;
use MainAppBundle\Entity\weaponEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

/**
 * Squadsentity controller.
 *
 */
class SquadsEntityController extends Controller
{

    /**
     * Creates a new squadsEntity entity.
     *
     * @Route("/list/addSquad", name="squadsentity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $listId = $request->get('list_id');
        $idFormation = $request->get('formation_id');
        if($listId == null)
        {
            $listId = $request->request->get('mainappbundle_squadsentity')['listId'];
        }
        if($idFormation == null)
        {
            $idFormation = $request->request->get('mainappbundle_squadsentity')['formationId'];
        }
        $squadsEntity = new Squadsentity();


        $formation = $this->getDoctrine()->getManager()->getRepository(FormationEntity::class)->findOneById($idFormation);
        $form = $this->createForm('MainAppBundle\Form\SquadsEntityType', $squadsEntity, [
            'faction' => $formation->getFaction()->getId(),
        ]);
        $form->add("listId", HiddenType::class, array("mapped"=>false, "data"=>$listId, "label"=>false));
        $form->add("formationId", HiddenType::class, array("mapped"=>false, "data"=>$idFormation, "label"=>false));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $formation = $em->getRepository(FormationEntity::class)->find($idFormation);
            $squadsEntity->setFormation($formation);
            $squadsModelRequirements =$squadsEntity->getSquadModel()->getSquadRequirements();
            $modelRepo = $em->getRepository(Models::class);
        foreach ($squadsModelRequirements as $squadModelRequirement)
        {
            $modelModel = $modelRepo->find($squadModelRequirement->getModel()->getId());
            for($i=0; $i < $squadModelRequirement->getMin(); $i++)
            {
                $modelEntity = new ModelEntity();
                $em->persist($modelEntity);

                $profil = new ProfilEntity();
                $em->persist($profil);


                $modelEntity->setProfilEntity($profil);
                $modelEntity->setModelTemplate($squadModelRequirement->getModel());

                $profil->setWound($modelModel->getWound());

                $profilData = $modelEntity->getProfilForCurrentLife($profil->getWound());

                $profil->setAttack($profilData->getAttack());
                $profil->setSave($profilData->getSave());
                $profil->setLeadership($profilData->getLeadership());
                $profil->setToughness($profilData->getToughness());
                $profil->setBS($profilData->getBS());
                $profil->setMove($profilData->getMove());
                $profil->setWS($profilData->getWS());
                $profil->setStrength($profilData->getStrength());
                $modelEntity->setSquadEntity($squadsEntity);
                $squadsEntity->addModelsEntity($modelEntity->setModelTemplate($modelModel));

                $weaponsModel = $modelEntity->getModelTemplate()->getWeapons();
                foreach($weaponsModel as $weaponModel)
                {
                    for($j = 0; $j<$weaponModel->getcount(); $j++)
                    {
                        $weaponEntity = new weaponEntity();
                        $weaponEntity->setModelEntity($modelEntity);

                        $weaponEntity->setWeaponModel($weaponModel->getWeapon());
                        $em->persist($weaponEntity);
                    }
                }
            }

        }
            $em->persist($squadsEntity);
            $em->flush();

            return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));

        }

        return $this->render('@MainApp/squadsentity/new.html.twig', array(
            'squadsEntity' => $squadsEntity,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing squadsEntity entity.
     *
     * @Route("/squadEntity/{id}/edit", name="squadsentity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SquadsEntity $squadsEntity)
    {
        $deleteForm = $this->createDeleteForm($squadsEntity);
        $editForm = $this->createForm('MainAppBundle\Form\SquadsEntityType', $squadsEntity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('squadsentity_edit', array('id' => $squadsEntity->getId()));
        }

        return $this->render('squadsentity/edit.html.twig', array(
            'squadsEntity' => $squadsEntity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a squadsEntity entity.
     *
     * @Route("/squadEntity/{id}", name="squadsentity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SquadsEntity $squadsEntity)
    {
        $form = $this->createDeleteForm($squadsEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($squadsEntity);
            $em->flush();
        }

        return $this->redirectToRoute('squadsentity_index');
    }

    /**
     * Creates a form to delete a squadsEntity entity.
     *
     * @param SquadsEntity $squadsEntity The squadsEntity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SquadsEntity $squadsEntity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('squadsentity_delete', array('id' => $squadsEntity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @param Request $request
     * @Route("/squadEntity/clone", name="squadentity_clone", options={"expose"=true})
     * @Method("POST")
     */
    public function duplicateAction(Request $request)
    {
        $listId = $request->get('list_id');
        $squadId = $request->get('squad_id');

        if(!(isset($listId)) || $listId == "")
        {
            echo "6001";
        }
        else if(!(isset($squadId)) || $squadId == "")
        {
            echo "6002";
        }
        else
        {
            $em = $this->getDoctrine()->getManager();
            $squadTemplate = $em->getRepository(SquadsEntity::class)->findOneById($squadId);

            $this->container->get('MainAppBundle\Service\SquadEntityService')->duplicate($squadTemplate);
        }
        return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));
    }

    /**
     * @param Request $request
     * @Route("/squadEntity/remove", name="squadentity_remove", options={"expose"=true})
     * @Method("POST")
     */
    public function removeAction(Request $request)
    {
        $listId = $request->get('list_id');
        $squadId = $request->get('squad_id');

        if(!(isset($listId)) || $listId == "")
        {
            echo "6001";
        }
        else if(!(isset($squadId)) || $squadId == "")
        {
            echo "6002";
        }
        else
        {
            $em = $this->getDoctrine()->getManager();
            $squad = $em->getRepository(SquadsEntity::class)->findOneById($squadId);
            $em->remove($squad);
            $em->flush();
        }
        return $this->redirectToRoute('main_app_listShow',  array('id' => $listId));
    }


}
