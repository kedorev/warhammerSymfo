<?php


namespace MainAppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArtefactAdmin extends AbstractAdmin
{
protected function configureFormFields(FormMapper $formMapper)
{
$formMapper->add('name', 'text')
    ->add('description','textarea')
    ->add('faction', 'sonata_type_model', [
        'class' => 'MainAppBundle\Entity\Faction',
        'property' => 'name',
    ])->add('subfaction', 'sonata_type_model', [
        'class' => 'MainAppBundle\Entity\SubFaction',
        'property' => 'name',
        'required' => false,
    ]);
}

protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
$datagridMapper->add('name');
}

protected function configureListFields(ListMapper $listMapper)
{
$listMapper->add('id')->addIdentifier('name')->add('description')->add('faction')->add('subfaction');
}
}