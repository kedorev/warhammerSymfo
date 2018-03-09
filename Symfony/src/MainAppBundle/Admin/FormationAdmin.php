<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 24/01/2018
 * Time: 10:54
 */

namespace MainAppBundle\Admin;



use Doctrine\DBAL\Types\TextType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FormationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with("data")
                ->add('name', 'text')
            ->end()
            ->with('Requirements')
                ->add('FormationRequirements', 'sonata_type_model', [
                    'class' => 'MainAppBundle\Entity\FormationRequirement',
                    'property' => 'name',
                    'multiple' => true,
                ])
            ->end()
        ;
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