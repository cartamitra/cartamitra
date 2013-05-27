<?php

namespace Carta\CartaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Carta\CartaBundle\Entity\Comandas;
use Carta\CartaBundle\Form\ComandasType;

/**
 * Comandas controller.
 *
 * @Route("/comandas")
 */
class ComandasController extends Controller
{
    /**
     * Lists all Comandas entities.
     *
     * @Route("/", name="comandas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartaCartaBundle:Comandas')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Comandas entity.
     *
     * @Route("/", name="comandas_create")
     * @Method("POST")
     * @Template("CartaCartaBundle:Comandas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Comandas();
        $form = $this->createForm(new ComandasType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comandas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Comandas entity.
     *
     * @Route("/new", name="comandas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Comandas();
        $form   = $this->createForm(new ComandasType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Comandas entity.
     *
     * @Route("/{id}", name="comandas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:Comandas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comandas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Comandas entity.
     *
     * @Route("/{id}/edit", name="comandas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:Comandas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comandas entity.');
        }

        $editForm = $this->createForm(new ComandasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Comandas entity.
     *
     * @Route("/{id}", name="comandas_update")
     * @Method("PUT")
     * @Template("CartaCartaBundle:Comandas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:Comandas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comandas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ComandasType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comandas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Comandas entity.
     *
     * @Route("/{id}", name="comandas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CartaCartaBundle:Comandas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comandas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comandas'));
    }

    /**
     * Creates a form to delete a Comandas entity by id.
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
