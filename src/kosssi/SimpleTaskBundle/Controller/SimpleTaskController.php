<?php

namespace kosssi\SimpleTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SimpleTaskController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction($name = 'Simon')
    {
        $labelRepository = $this->getDoctrine()->getRepository('SimpleTaskBundle:Label');
        $labels = $labelRepository->findAll();

        return array('labels' => $labels);
    }
}
