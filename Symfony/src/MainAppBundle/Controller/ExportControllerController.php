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

class ExportControllerController extends Controller
{

    /**
     * @Route("/list/export/ETC", name="export_ETC",options={"expose"=true})
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exportETCAction(Request $request)
    {
        $repo = $this->getDoctrine()->getManager()->getRepository('MainAppBundle:Liste');
        $list = $repo->findOneById($request->get('list_id'));

        dump($list->getFaction());
        //dump($this->getUser());
        //die;
        return $this->render('MainAppBundle:Export:exportETC.html.twig', array('liste' => $list, 'user' => $this->getUser()));
    }
}
