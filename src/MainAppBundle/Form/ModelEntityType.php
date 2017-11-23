<?php

namespace MainAppBundle\Form;

use Doctrine\ORM\EntityRepository;
use MainAppBundle\Entity\weaponEntity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use MainAppBundle\Entity\Models;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModelEntityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        if($options['methodUsed'] == "create")
        {
            $builder->remove('profilEntity');
            $builder->add('modelTemplate', EntityType::class, [
                'class' => Models::class,
                'query_builder' => function (EntityRepository $repository) use ($options) {
                    return $repository->getAllModelFromSquadWithoutExec($options['squad_type']);
                }]);
        }
        elseif($options['methodUsed'] == "update")
        {
            $builder->remove('profilEntity');
            $builder->remove('modelTemplate');
            $builder->add('weaponsEntity', CollectionType::class, array(
                'entry_type' => weaponEntityType::class,
                'allow_add' => true
            ));
        }
        $builder->remove('squadEntity');

        dump($options);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined('squad_type');
        $resolver->setRequired('methodUsed');
        $resolver->setDefaults(array(
            'data_class' => 'MainAppBundle\Entity\ModelEntity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainappbundle_modelentity';
    }


}
