<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
    	
    	$form = $this->createFormBuilder()
    	->add('nomeFile', 'text', array('label'=>''))
    	//->add('nomeTexture', 'text', array('label'=>''))
    	->add('renderizza', 'submit', array('label'=>'yosh'))
    	->getForm();

    	$form ->handleRequest($request);

    	if ($form->isValid()){
    		$nomeFile = $form->getData()['nomeFile'];

    		return $this->render('AppBundle::index.html.twig', [
        	'form' => $form->createView(),
        	'nomeFile' => $nomeFile
       	]);
    	}
    	
    	$nomeFile = '';

        return $this->render('AppBundle::index.html.twig', [
        	'form' => $form->createView(),
        	'nomeFile' => $nomeFile
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
