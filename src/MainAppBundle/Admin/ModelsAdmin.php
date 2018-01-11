<?php

namespace MainAppBundle\Admin;

use Doctrine\DBAL\Types\TextType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ModelsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Data')
                ->add('name', 'text')
                ->add('Abilities', 'sonata_type_model', [
                    'class' => 'MainAppBundle\Entity\Abilities',
                    'property' => 'name',
                    'multiple' => true,
                    'required' => false
                ])
            ->end()
            ->with('Factions')
                ->add('factionKeyWord', 'sonata_type_model', [
                    'class' => 'MainAppBundle\Entity\Faction',
                    'property' => 'name',
                    'multiple' => true
                ])
            ->end();
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