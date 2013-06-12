<?php

namespace Carta\CartaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Carta\CartaBundle\Entity\Plato;
use Carta\CartaBundle\Form\PlatoType;

/**
 * Plato controller.
 *
 * @Route("/plato")
 */
class PlatoController extends Controller
{
    /**
     * Lists all Plato entities.
     *
     * @Route("/", name="plato")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartaCartaBundle:Plato')->findAll();
        
        foreach ($entities as $ar ){
            $etipo = $em->getRepository('CartaCartaBundle:Tipo')->findOneByid($ar->gettipoid());
            $tiponombre[] = $etipo->gettipo();
        }

        return array(
            'entities' => $entities,
            'tiponombre' => $tiponombre
        );
    }

    /**
     * Creates a new Plato entity.
     *
     * @Route("/", name="plato_create")
     * @Method("POST")
     * @Template("CartaCartaBundle:Plato:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Plato();
        $form = $this->createForm(new PlatoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('plato_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Plato entity.
     *
     * @Route("/new", name="plato_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Plato();
        $form   = $this->createForm(new PlatoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Plato entity.
     *
     * @Route("/{id}", name="plato_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:Plato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Plato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Plato entity.
     *
     * @Route("/{id}/edit", name="plato_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:Plato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Plato entity.');
        }

        $editForm = $this->createForm(new PlatoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Plato entity.
     *
     * @Route("/{id}", name="plato_update")
     * @Method("PUT")
     * @Template("CartaCartaBundle:Plato:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:Plato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Plato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PlatoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('plato_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Plato entity.
     *
     * @Route("/{id}", name="plato_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CartaCartaBundle:Plato')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Plato entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('plato'));
    }

    /**
     * Creates a form to delete a Plato entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
