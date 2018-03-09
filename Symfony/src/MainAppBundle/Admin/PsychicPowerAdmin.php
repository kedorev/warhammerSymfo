<?php
/**
 * Created by PhpStorm.
 * User: lerm
 * Date: 16/02/2018
 * Time: 11:14
 */

namespace MainAppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PsychicPowerAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text')
            ->add('range', 'integer',['required' => false])
            ->add('power', 'integer')
            ->add('description', 'textarea')
            ->add('PsychicCategory', 'sonata_type_model', [
                'class' => 'MainAppBundle\Entity\PsychicCategory',
                'property' => 'name',
                'multiple' => false,
                'required' => true
            ])  ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id')->addIdentifier('name');
    }

    public function preSave()
    {
        dump($this);
        die;
        $this->getUserManager()->updatePassword($user);
    }

}