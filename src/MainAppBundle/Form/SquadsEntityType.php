<?php

namespace MainAppBundle\Form;

use Doctrine\ORM\EntityRepository;
use MainAppBundle\Entity\Squad;
use MainAppBundle\Entity\weaponEntity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SquadsEntityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('formation');
            $builder->add('squadModel', EntityType::class, [
                'class' => Squad::class,
                'query_builder' => function (EntityRepository $repository) use ($options) {
                    return $repository->getAllSquadFromFactionWithoutExec($options['faction']);
                }]);
            //->add('squadModel')->add();
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined('faction');
        $resolver->setDefaults(array(
            'data_class' => 'MainAppBundle\Entity\SquadsEntity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mainappbundle_squadsentity';
    }


}
