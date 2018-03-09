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

class FormationrequirementAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('formation', 'sonata_type_model', [
                'class' => 'MainAppBundle\Entity\Formation',
                'property' => 'name',
            ])
            ->add('min','integer')
            ->add('max','integer')
            ->add('SquadType', 'sonata_type_model', [
                'class' => 'MainAppBundle\Entity\SquadType',
                'property' => 'name',
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('formation')
            ->add("SquadType");
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('formation')
            ->add("SquadType");
    }
}