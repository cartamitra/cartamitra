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
            ->add('foto', 'entity', array( 'class' => 'CartaCartaBundle:Foto', 'property' => 'id',))
            /*->add('foto', 'entity', array('class' => 'CartaCartaBundle:Foto','query_builder' => 
                   function(EntityRepository $er) {
                    return $er->createQueryBuilder('f')
                        ->select('f.url');
                        ->add('where',$qb->expr()->orX(
                                      $qb->expr()->notIn('f.id', $qb->select(array('p.fotoid'))
                                                                    ->from('CartaCartaBundle:Plato', 'p')
                                              
                                              )));
                })) */   
            ->add('precio');
        
    }
    /*
       $qb->add('select', new Expr\Select(array('f.url')))
                ->add('from', new Expr\From('foto', 'f'))
                ->add('where', 
                     $qb->expr()->orX(
                     $qb->expr()->notIn('f.id', 
                        $qb->expr()->select('p.fotoId')
                        $qb->expr()->from('plato','p')
             )))
     */

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Carta\CartaBundle\Entity\Plato'));
    }

    public function getName()
    {
        return 'carta_cartabundle_platotype';
    }
}
