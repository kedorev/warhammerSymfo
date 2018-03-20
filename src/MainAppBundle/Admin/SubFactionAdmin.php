<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 20/03/2018
 * Time: 09:56
 */

namespace MainAppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SubFactionAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('faction', 'sonata_type_model', [
                'class' => 'MainAppBundle\Entity\Faction',
                'property' => 'name',
            ])
            ->add('name', 'text')
            ->add('rules', 'textarea');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')->add('id')->add('faction');
    }
}