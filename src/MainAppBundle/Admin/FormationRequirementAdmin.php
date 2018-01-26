<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 24/01/2018
 * Time: 09:08
 */

namespace MainAppBundle\Admin;


use Doctrine\DBAL\Types\TextType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FormationRequirementAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text')
            ->add('min','integer')
            ->add('max','integer')
            ->add('type','SquadType', array(
                'class'=>'MainAppBundle\Entity\SquadType',
                'choice_label' => 'name'
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }
}