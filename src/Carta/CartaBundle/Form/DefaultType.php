<?php

namespace Carta\CartaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class DefaultType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('')
        ;
    }

    public function getName()
    {
        return 'carta_cartabundle_defaulttype';
    }
}
