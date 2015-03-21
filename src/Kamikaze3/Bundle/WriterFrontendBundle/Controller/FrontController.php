<?php

namespace Kamikaze3\Bundle\WriterFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FrontController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template("Kamikaze3WriterFrontendBundle::layout.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}
