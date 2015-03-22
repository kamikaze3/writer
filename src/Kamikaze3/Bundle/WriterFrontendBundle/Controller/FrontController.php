<?php

namespace Kamikaze3\Bundle\WriterFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FrontController extends Controller
{
	const TEMPLATE_PATH = "Kamikaze3WriterFrontendBundle";
    /**
     * @Route("/", name="index")
     * @Template("Kamikaze3WriterFrontendBundle::layout.html.twig")
     */
    public function indexAction()
    {
        return array();
    }

    /**
    * @Route("/templates/{name}") 
    */
    public function templateAction($name)
    {
    	return $this->render(self::TEMPLATE_PATH . ':template:' . $name . '.php');
    }

    /**
    * @Route("/templates/{folder}/{name}") 
    */
    public function template2Action($folder, $name)
    {
        return $this->render(self::TEMPLATE_PATH . ':template:' . $folder . ':' . $name . '.php');
    }
}
