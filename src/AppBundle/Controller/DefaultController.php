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
        	'file' => '3d_file_storage/porsche.obj',
       	]);
    }

    /**
     * @Route("/index_material", name="index_material")
     */
    public function index_materialAction()
    {
        return $this->render('AppBundle::index_material.html.twig');
    }
}
