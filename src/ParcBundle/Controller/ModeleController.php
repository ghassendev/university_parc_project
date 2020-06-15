<?php

namespace ParcBundle\Controller;

use ParcBundle\Entity\Modele;
use ParcBundle\Form\ModeleType;
use ParcBundle\Form\RechercheModeleForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Modele controller.
 *
 * @Route("modele")
 */
class ModeleController extends Controller
{
    /**
     * Lists all modele entities.
     *
     * @Route("/", name="modele_index")
     * @Method({"GET","POST"})
     */
    public function indexAction()
    {
        $modele=new Modele();
        $em = $this->getDoctrine()->getManager();

        $modeles = $em->getRepository('ParcBundle:Modele')->findAll();
        
        $form=$this->createForm('ParcBundle\Form\RechercheModeleForm' ,$modele);
        $request=$this->get('request_stack')->getCurrentRequest();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $modeles=$em->getRepository("ParcBundle:Modele")->findBy(array('libelle'=>$form->get('Libelle')->getData()));

        }
            return $this->render('modele/index.html.twig',array('form'=>$form->createView(),
                                                    'modeles' => $modeles,
    ));
    }

    /**
     * Creates a new modele entity.
     *
     * @Route("/new", name="modele_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $modele = new Modele();
        $form = $this->createForm('ParcBundle\Form\ModeleType', $modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
    
            $em = $this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();

            return $this->redirectToRoute('modele_show', array('id' => $modele->getId()));
        }

        return $this->render('modele/new.html.twig', array(
            'modele' => $modele,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a modele entity.
     *
     * @Route("/{id}", name="modele_show")
     * @Method("GET")
     */
    public function showAction(Modele $modele)
    {
        $deleteForm = $this->createDeleteForm($modele);

        return $this->render('modele/show.html.twig', array(
            'modele' => $modele,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing modele entity.
     *
     * @Route("/{id}/edit", name="modele_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Modele $modele)
    {
        $deleteForm = $this->createDeleteForm($modele);
        $editForm = $this->createForm('ParcBundle\Form\ModeleType', $modele);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modele_edit', array('id' => $modele->getId()));
        }

        return $this->render('modele/edit.html.twig', array(
            'modele' => $modele,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a modele entity.
     *
     * @Route("/{id}", name="modele_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Modele $modele)
    {
        $form = $this->createDeleteForm($modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modele);
            $em->flush();
        }

        return $this->redirectToRoute('modele_index');
    }

    /**
     * Creates a form to delete a modele entity.
     *
     * @param Modele $modele The modele entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Modele $modele)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modele_delete', array('id' => $modele->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
