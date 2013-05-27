<?php

namespace Carta\CartaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrecioTotalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoPrecio')
            ->add('platoId')
            ->add('precio')
            ->add('tipoprecios')
            ->add('plato')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Carta\CartaBundle\Entity\PrecioTotal'
        ));
    }

    public function getName()
    {
        return 'carta_cartabundle_preciototaltype';
    }
}
