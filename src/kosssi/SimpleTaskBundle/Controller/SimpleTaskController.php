<?php

namespace kosssi\SimpleTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use kosssi\SimpleTaskBundle\Entity\Dashboard;

class SimpleTaskController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $db = $this->getDoctrine()->getRepository('SimpleTaskBundle:Dashboard');
        /** @var Dashboard $dashboard */
        $dashboard = $db->findOneBy(array('user' => 'kosssi'));

        if ($request->isXmlHttpRequest()) {
            $viewName = 'SimpleTaskBundle:Label:_list.html.twig';
        } else {
            $viewName = 'SimpleTaskBundle:SimpleTask:index.html.twig';
        }

        return $this->render($viewName, array('labels' => $dashboard->getLabels()));
    }
}
