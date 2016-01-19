<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle::index.html.twig', [
        	
       	]);
    }

    /**
     * @Route("/index_material", name="index_material")
     */
    public function index_materialAction()
    {
        return $this->render('AppBundle::index_material.html.twig');
    }
    /**
     * @Route("/object_viewer", name="object_viewer")
     */
    public function object_viewerAction()
    {
        return $this->render('AppBundle::object_viewer.html.twig');
    }
}
