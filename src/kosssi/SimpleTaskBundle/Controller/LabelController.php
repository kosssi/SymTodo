<?php

namespace kosssi\SimpleTaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use kosssi\SimpleTaskBundle\Entity\Label;

class LabelController extends Controller
{
    /**
     * @Route("/label/new", name="label_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $db = $this->getDoctrine()->getRepository('SimpleTaskBundle:Dashboard');
        /** @var Dashboard $dashboard */
        $dashboard = $db->findOneBy(array('user' => 'kosssi'));

        $label = new Label();

        $form = $this->createFormBuilder($label)->add('Name', 'text')->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {

                $label->setDashboard($dashboard);

                /** @var \Doctrine\ORM\EntityManager $em */
                $em = $this->get('doctrine.orm.entity_manager');
                $em->persist($label);
                $em->flush();

                return $this->redirect($this->generateUrl('homepage'));
            }
        }

        if ($request->isXmlHttpRequest()) {
            $viewName = 'SimpleTaskBundle:Label:_form.html.twig';
        } else {
            $viewName = 'SimpleTaskBundle:Label:new.html.twig';
        }

        return $this->render($viewName, array('form' => $form->createView()));
    }
}
