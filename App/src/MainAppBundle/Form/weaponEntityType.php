<?php

namespace MainAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use MainAppBundle\Entity\weaponEntity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use MainAppBundle\Entity\Models;

class weaponEntityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('modelEntity');
        $builder->add('weaponModel', EntityType::class, [
            'class' => Models::class,
            'query_builder' => function (EntityRepository $repository) use ($options) {
                return $repository->getWeaponFromWeaponList($options['squad_type']);
            }]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainAppBundle\Entity\weaponEntity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainappbundle_weaponentity';
    }


}
