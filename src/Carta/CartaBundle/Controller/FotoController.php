<?php

namespace Carta\CartaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Carta\CartaBundle\Entity\Foto;
use Carta\CartaBundle\Form\FotoType;

/**
 * Foto controller.
 *
 * @Route("/foto")
 */
class FotoController extends Controller
{
    /**
     * Lists all Foto entities.
     *
     * @Route("/", name="foto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartaCartaBundle:Foto')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Foto entity.
     *
     * @Route("/", name="foto_create")
     * @Method("POST")
     * @Template("CartaCartaBundle:Foto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Foto();
        $form = $this->createForm(new FotoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('foto_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Foto entity.
     *
     * @Route("/new", name="foto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Foto();
        $form   = $this->createForm(new FotoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Foto entity.
     *
     * @Route("/{id}", name="foto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:Foto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Foto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Foto entity.
     *
     * @Route("/{id}/edit", name="foto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:Foto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Foto entity.');
        }

        $editForm = $this->createForm(new FotoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Foto entity.
     *
     * @Route("/{id}", name="foto_update")
     * @Method("PUT")
     * @Template("CartaCartaBundle:Foto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartaCartaBundle:Foto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Foto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FotoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('foto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Foto entity.
     *
     * @Route("/{id}", name="foto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CartaCartaBundle:Foto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Foto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('foto'));
    }

    /**
     * Creates a form to delete a Foto entity by id.
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
