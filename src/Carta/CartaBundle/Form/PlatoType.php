<?php

namespace Carta\CartaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlatoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('tipo', 'entity', array( 'class' => 'CartaCartaBundle:Tipo', 'property' => 'tipo',))
            ->add('foto', 'entity', array( 'class' => 'CartaCartaBundle:Foto', 'property' => 'url',))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Carta\CartaBundle\Entity\Plato'
        ));
    }

    public function getName()
    {
        return 'carta_cartabundle_platotype';
    }
}
