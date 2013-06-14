<?php

namespace Carta\CartaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class mesasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mesa', 'entity', array( 'class' => 'CartaCartaBundle:mesa', 'property' => 'mesa',))
        ;
    }

    public function getName()
    {
        return 'carta_cartabundle_mesastype';
    }
}
