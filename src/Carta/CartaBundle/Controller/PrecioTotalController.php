<?php

namespace Carta\CartaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Carta\CartaBundle\Entity\PrecioTotal;
use Carta\CartaBundle\Form\PrecioTotalType;

/**
 * PrecioTotal controller.
 *
 * @Route("/preciototal")
 */
class PrecioTotalController extends Controller
{
    /**
     * Lists all PrecioTotal entities.
     *
     * @Route("/", name="preciototal")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartaCartaBundle:PrecioTotal')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new PrecioTotal entity.
     *
     * @Route("/", name="preciototal_create")
     * @Method("POST")
     * @Template("CartaCartaBundle:PrecioTotal:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new PrecioTotal();
        $form = $this->createForm(new PrecioTotalType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('preciototal_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new PrecioTotal entity.
     *
     * @Route("/new", name="preciototal_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PrecioTotal();
        $form   = $this->createForm(new PrecioTotalType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PrecioTotal entity.
     *
     * @Route("/{id}", name="preciototal_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:PrecioTotal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PrecioTotal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PrecioTotal entity.
     *
     * @Route("/{id}/edit", name="preciototal_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:PrecioTotal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PrecioTotal entity.');
        }

        $editForm = $this->createForm(new PrecioTotalType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing PrecioTotal entity.
     *
     * @Route("/{id}", name="preciototal_update")
     * @Method("PUT")
     * @Template("CartaCartaBundle:PrecioTotal:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:PrecioTotal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PrecioTotal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PrecioTotalType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('preciototal_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a PrecioTotal entity.
     *
     * @Route("/{id}", name="preciototal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CartaCartaBundle:PrecioTotal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PrecioTotal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('preciototal'));
    }

    /**
     * Creates a form to delete a PrecioTotal entity by id.
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
