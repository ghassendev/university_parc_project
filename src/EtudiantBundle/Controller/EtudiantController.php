<?php

namespace EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;

class EtudiantController extends Controller
{
    /**
     * @Route("/Etudiants", name="Etudiant_index")
     */
    public function indexAction()
    {
        return $this->render('Etudiant/index.html.twig');
    }

       /**
     * @Route("/Etudiant/affiche/{name}", name="Etudiant_affiche")
     */
    public function afficheAction($name)
    {
        return $this->render('Etudiant/affiche.html.twig',array("name"=>$name));
    }
}

