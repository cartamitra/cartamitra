<?php

namespace Carta\CartaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipoPrecioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('porcentaje')
            ->add('cliente','entity', array( 'class' => 'CartaCartaBundle:Cliente', 'property' => 'tipocliente',))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Carta\CartaBundle\Entity\TipoPrecio'
        ));
    }

    public function getName()
    {
        return 'carta_cartabundle_tipopreciotype';
    }
}
