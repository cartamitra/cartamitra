<?php
namespace MDW\CartaBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PlatoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tipo', 'entity', array( 'class' => 'MDWCartaBundle:Tipos', 'property' => 'tipo',))
                ->add('nombre')
                ->add('precio')
                ->add('foto_id');
    }
    public function getName()
    {
        return 'plato_form';
    }
}