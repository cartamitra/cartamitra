<?php

namespace Carta\CartaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComandasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('fecha')
            ->add('plato','entity', array( 'class' => 'CartaCartaBundle:Plato', 'property' => 'Nombre',))
            ->add('cliente','entity', array( 'class' => 'CartaCartaBundle:Cliente', 'property' => 'tipoCliente',))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Carta\CartaBundle\Entity\Comandas'
        ));
    }

    public function getName()
    {
        return 'carta_cartabundle_comandastype';
    }
}
